
function showChat() {
    var x = document.getElementById("id_khungChat");
    if (x.style.display !== "flex") {
        x.style.display = "flex";
    } else {
        x.style.display = "none";
    }
}
function sendChat(){
    var noiDung = $("#noi_dung_chat").val();
    $.ajax({
            method: "POST",
            url: "process/chat_sendChat.php",
            data: {
                noi_dung : noiDung,
                loai : 'Gửi'
            }
    });
    document.getElementById("noi_dung_chat").value="";
}
function chatLog(){
    $.ajax({
            method: "GET",
            url: "process/chat_chatLog.php",
            success : function(response){
                document.getElementById("noiDung_chat").innerHTML= response;
                var newscrollHeight = document.getElementById("noiDung_chat").scrollHeight;
                document.getElementById("noiDung_chat").scrollTop = newscrollHeight;
            }
    });
}