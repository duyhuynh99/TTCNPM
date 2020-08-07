<div class="khungChat" id="id_khungChat">
    <div style="height: 100%;width:300px;">
        <div class="header_khungChat">
            <div class="title_chat"> chat để được hỗ trợ miễn phí </div>
            <div class="btn_tatChat" onclick="showChat()"><i class="fas fa-window-close" style="font-size:20px;"></i></div>
        </div>
        <div class="panel_chatInfo">
            <div>
                <div class="anh_dai_dien">
                    <img src="images/index/anh_dai_dien.jpg" style="width:100%;height:100%" alt="anhdaidien">
                </div>
                <div class="thongTin">
                    <p><b>Quản trị viên</b> <br> Sẵn sàng hỗ trợ <br> Số điện thoại: 0123321567</p>
                </div>
                <div class="call_btn">
                    <div style="background-color: green;border-radius: 100%; padding: 5px 5px 5px 5px;cursor: pointer;">
                        <img src="images/index/telephone.png" style="width:100%;height:100%;background-color:green;">
                    </div>

                </div>
            </div>
        </div>
        <div class="Noidung_chat" id="noiDung_chat">
            <script>
                chatLog();
                setInterval(chatLog,300);
            </script>
        </div>
        <div class="nhap_chat">
            <textarea class="vung_chat" id="noi_dung_chat" style="width: 230px;float:left;"></textarea>
            <button id="gui_chat" onclick="sendChat()" style="display: inline-block; margin-top:8px;">Enter</button>
        </div>
    </div>
</div>