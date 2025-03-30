
    <style>
        /* تنسيق الأيقونة العائمة */
          /* تنسيق الأيقونة العائمة */
          .chat-icon-container {
            position: fixed;
            bottom: 30px;
            left: 30px;
            z-index: 9999;
        }

        .chat-icon {
            background: #f85959;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            box-shadow: 0 4px 12px rgba(0,0,0,0.25);
            transition: all 0.3s ease;
        }

        .chat-icon:hover {
            transform: scale(1.1);
            box-shadow: 0 6px 16px rgba(0,0,0,0.3);
        }

        .chat-icon i {
            color: white;
            font-size: 28px;
        }

        /* نافذة الشات */
        .chat-window {
            position: fixed;
            bottom: 100px;
            left: 30px;
            width: 400px;
            max-width: 90vw;
            height: 70vh;
            background: white;
            border-radius: 20px;
            box-shadow: 0 8px 32px rgba(0,0,0,0.2);
            display: none;
            flex-direction: column;
            z-index: 9998;
            font-family: 'Arial', sans-serif;
        }

        .chat-header {
    background: #f85959;
    color: white;
    padding: 15px 20px;
    border-radius: 20px 20px 0 0;
    display: flex;
    justify-content: center; /* تغيير من space-between إلى center */
    align-items: center;
    position: relative; /* إضافة لاحتواء زر الإغلاق */
}
        .chat-messages {
            flex: 1;
            padding: 15px;
            overflow-y: auto;
            background: #f8fafc;
        }

        .message {
            margin: 10px 0;
            padding: 12px 16px;
            border-radius: 15px;
            max-width: 80%;
            line-height: 1.5;
            position: relative;
            direction: rtl; /* إضافة اتجاه النص */
            text-align: right; /* محاذاة النص لليمين */
            unicode-bidi: embed; /* مهم للنصوص المختلطة */
        }

        .user-message {
            background: #dbeafe;
            margin-left: auto;
            margin-right: 0; /* تعديل للمحاذاة */
            border: 1px solid #bfdbfe;
        }

        .assistant-message {
            background: #e0e1fecb;
            margin-right: auto;
            margin-left: 0; /* تعديل للمحاذاة */
            border: 1px solid #bae6fd;
        }

        .copy-btn {
            position: absolute;
            bottom: 5px;
            left: auto; /* تعديل الموضع */
            right: 92%; /* وضع زر النسخ على اليسار */
            cursor: pointer;
            opacity: 0.6;
            font-size: 12px;
        }

        .chat-input-container {
            padding: 15px;
            background: white;
            border-top: 1px solid #e0e7ff;
            display: flex;
            gap: 10px;
        }

        #message-input {
            flex: 1;
            padding: 12px;
            border: 2px solid #e0e7ff;
            border-radius: 12px;
            font-size: 16px;
            direction: rtl; /* اتجاه حقل الإدخال */
            text-align: right; /* محاذاة النص */
        }

        .send-btn {
            background: #f85959;
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 12px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .send-btn:hover {
            background: #2563eb;
        }

        .loading {
            display: none;
            text-align: center;
            padding: 10px;
            color: #64748b;
        }
        .close-btn {
    position: absolute;
    left: 20px; /* تعديل الموضع ليتناسب مع الاتجاه RTL */
    cursor: pointer;
    font-size: 24px;
    padding: 5px;
}
        .chat-header span{
            text-align: center;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

<!-- أيقونة الشات العائمة -->
<div class="chat-icon-container">
    <div class="chat-icon" onclick="toggleChat()">
        <i class="fas fa-comment-dots"></i>
    </div>
</div>

<!-- نافذة الشات -->
<div class="chat-window" id="chatWindow">
    <div class="chat-header">
        <span style="
            display: block;
            width: 100%;
            text-align: center;
            margin: 0 auto;
            font-size: 1.2em;
            font-weight: bold;
        ">مساعد الذكاء الاصطناعي</span>
        <span class="close-btn" onclick="toggleChat()">×</span>
    </div>
    
    <div class="chat-messages" id="chatMessages"></div>
    
    <div class="loading" id="loading">جارٍ التفكير...</div>
    
    <div class="chat-input-container">
        <button class="send-btn" onclick="sendMessage()">إرسال</button>
        <input 
            type="text" 
            id="message-input" 
            placeholder="اكتب رسالتك هنا..."
            autocomplete="off" 
            onfocus="this.value=''" 
        >
    </div>
</div>

<script>
    const GEMINI_API_KEY = 'AIzaSyAgMAJZ9iheZFcpnIShGilunsYMOOYOEcw';
    const MODEL_NAME = 'gemini-2.0-flash';
    const API_ENDPOINT = `https://generativelanguage.googleapis.com/v1beta/models/${MODEL_NAME}:generateContent`;
    let chatHistory = [];
    let isGenerating = false;

    function toggleChat() {
        const chatWindow = document.getElementById('chatWindow');
        chatWindow.style.display = chatWindow.style.display === 'flex' ? 'none' : 'flex';
    }

    async function sendMessage() {
        if (isGenerating) return;

        const input = document.getElementById('message-input');
        const message = input.value.trim();
        if (!message) return;

        input.value = '';
        addMessage('user', message);
        document.getElementById('loading').style.display = 'block';
        isGenerating = true;

        try {
            const response = await fetch(API_ENDPOINT + `?key=${GEMINI_API_KEY}`, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({
                    contents: [...chatHistory, { role: 'user', parts: [{ text: message }] }],
                    generationConfig: {
                        temperature: 0.7,
                        topP: 0.9,
                        topK: 40,
                        maxOutputTokens: 2048,
                    },
                    safetySettings: [/*... نفس الإعدادات الأمنية ...*/]
                })
            });

            const data = await response.json();
            let responseText = data.candidates[0].content.parts[0].text;
            
            // تخصيص الردود
            responseText = responseText
                .replace(/أنا نموذج لغوي كبير، تم تدريبي بواسطة جوجل/g,
                 'شركة أنا نموذج لغوي كبير، تم تدريبي بواسطة سايتس للسياحة')
                .replace(/\n/g, '<br>');

            addMessage('assistant', responseText);
            updateChatHistory(message, responseText);

        } catch (error) {
            console.error('Error:', error);
            addMessage('assistant', 'حدث خطأ في الاتصال بالخدمة');
        } finally {
            document.getElementById('loading').style.display = 'none';
            isGenerating = false;
        }
    }

    function addMessage(role, content) {
        const messagesDiv = document.getElementById('chatMessages');
        const messageDiv = document.createElement('div');
        messageDiv.className = `message ${role}-message`;
        messageDiv.innerHTML = content;

        if (role === 'assistant') {
            const copyBtn = document.createElement('span');
            copyBtn.className = 'copy-btn';
            copyBtn.innerHTML = '<i class="fas fa-copy"></i>';
            copyBtn.onclick = () => copyToClipboard(content);
            messageDiv.prepend(copyBtn);
        }

        messagesDiv.appendChild(messageDiv);
        messagesDiv.scrollTop = messagesDiv.scrollHeight;
    }

    function copyToClipboard(text) {
        navigator.clipboard.writeText(text.replace(/<br>/g, '\n'))
            .then(() => alert('تم النسخ بنجاح'))
            .catch(err => console.error('Failed to copy:', err));
    }

    function updateChatHistory(userMessage, assistantMessage) {
        chatHistory.push(
            { role: 'user', parts: [{ text: userMessage }] },
            { role: 'model', parts: [{ text: assistantMessage }] }
        );
    }

    // إدارة أحداث لوحة المفاتيح
    document.getElementById('message-input').addEventListener('keypress', (e) => {
        if (e.key === 'Enter' && !e.shiftKey) {
            e.preventDefault();
            sendMessage();
        }
    });
</script>

</body>
</html>