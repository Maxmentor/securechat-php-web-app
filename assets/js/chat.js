const msgBox = document.getElementById("messages");
const msgBoxPopup = document.getElementById("messagesPopup");

const msgInput = document.getElementById("msgInput");
const msgInputPopup = document.getElementById("msgInputPopup");

const fileInput = document.getElementById("fileInput");
const fileInputPopup = document.getElementById("fileInputPopup");

const sendBtn = document.getElementById("sendBtn");
const sendBtnPopup = document.getElementById("sendBtnPopup");

let lastMessageCount = 0;

// FETCH MESSAGES (REALTIME POLLING)
function fetchMessages(){
    fetch("api/fetch_messages.php")
    .then(res => res.json())
    .then(data => {

        if(!Array.isArray(data)) return;

        if(data.length === lastMessageCount) return;

        lastMessageCount = data.length;

        msgBox.innerHTML = "";
        if(msgBoxPopup) msgBoxPopup.innerHTML = "";

        data.forEach(m => {
            const div = document.createElement("div");
            div.className = "chat-msg " + (m.username === USERNAME ? "me" : "other");

            div.innerHTML = `
                <div class="bubble">
                    <div class="uname">${m.username}</div>
                    ${m.message ? `<div class="text">${m.message}</div>` : ""}
                    ${m.image ? `<img src="${m.image}" class="chat-img">` : ""}
                </div>
            `;

            msgBox.appendChild(div);
            if(msgBoxPopup) msgBoxPopup.appendChild(div.cloneNode(true));
        });

        msgBox.scrollTop = msgBox.scrollHeight;
        if(msgBoxPopup){
            msgBoxPopup.scrollTop = msgBoxPopup.scrollHeight;
        }
    })
    .catch(()=>{});
}

// REALTIME LOOP (🔥 THIS IS THE MAGIC)
setInterval(fetchMessages, 1000);

// SEND MESSAGE
function sendMessage(input, fileInputEl){
    const msg = input.value.trim();
    const file = fileInputEl.files[0];

    if(msg === "" && !file) return;

    const formData = new FormData();
    formData.append("message", msg);
    if(file) formData.append("image", file);

    fetch("api/send_message.php", {
        method: "POST",
        body: formData
    })
    .then(res => res.json())
    .then(res => {
        if(res.status === "ok"){
            input.value = "";
            fileInputEl.value = "";
            fetchMessages();
        }
    });
}

// BUTTONS
if(sendBtn) sendBtn.onclick = ()=>sendMessage(msgInput, fileInput);
if(sendBtnPopup) sendBtnPopup.onclick = ()=>sendMessage(msgInputPopup, fileInputPopup);

// ENTER KEY
[msgInput, msgInputPopup].forEach(inp=>{
    if(inp){
        inp.addEventListener("keypress", e=>{
            if(e.key==="Enter"){
                e.preventDefault();
                sendMessage(inp, inp===msgInput? fileInput:fileInputPopup);
            }
        });
    }
});

// FIRST LOAD
fetchMessages();
