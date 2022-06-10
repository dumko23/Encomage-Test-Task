<?php

namespace App;

require __DIR__ . '/../../vendor/autoload.php';

require 'layouts/header.php'

?>
    <title>Post Page</title>
    <script>
        $(document).ready(function(){
                $.ajax({
                    url : "postList",
                    success : function(data) {
                        $('#postList').html(data);
                    },
                    error : function() {
                        alert("Error");
                    }
                });
        })
    </script>
</head>
<body>
<a href="/">Back To Main</a>

<button id="myBtn1">Open Modal</button>
<div id="myModal1" class="modal">
    <div class="modal-content">

            <div id="close1" class="close">&times;<i class="fa-solid fa-xmark"></i></div>
        <form id="regForm" name="form1" enctype="multipart/form-data" onsubmit="return false">
            <div class="modal-body">
                <h3>Add post</h3>
                <label>Name:
                    <input name="data[userName]" type="text" required>
                </label>
                <label>Text:
                    <textarea name="data[text]" required></textarea>
                </label>
            </div>
            <button class="addPost" onclick="sendData()">Add Post</button>
        </form>
    </div>
</div>

<div id="myModal2" class="modal">
    <div class="modal-content">

        <div id="close2" class="close">&times;<i class="fa-solid fa-xmark"></i></div>
        <form id="regForm" name="form2" enctype="multipart/form-data" onsubmit="return false">
            <div class="modal-body">
                <h3>Add comment</h3>
                <label>Name:
                    <input name="data[userName]" type="text" required>
                </label>
                <label>Text:
                    <textarea name="data[text]" required></textarea>
                </label>
            </div>
            <button class="addPost" onclick="sendDataComment()">Add Post</button>
        </form>
    </div>
</div>

<ul id="postList">

</ul>



<script>
    let number;
    // Get the modal
    let modal1 = document.getElementById("myModal1");
    let modal2 = document.getElementById("myModal2");

    // Get the button that opens the modal
    let btn1 = document.getElementById("myBtn1");
    // let btn2 = $('#mybtn2');

    // Get the <span> element that closes the modal
    let span1 = document.getElementById("close1");
    let span2 = document.getElementById("close2");

    // When the user clicks on the button, open the modal
    btn1.onclick = function() {
        modal1.style.display = "block";
    }
    let oldForm = document.forms.form1;
    let tempForm;
    function openModal(id){
        modal2.style.display = "block";

        tempForm = new FormData(oldForm);
        tempForm.append('postId', id)
        console.log(tempForm.get('postId'))
    }

    // When the user clicks on <span> (x), close the modal
    span1.onclick = function() {
        modal1.style.display = "none";
    }
    span2.onclick = function() {
        modal2.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target === modal1) {
            modal1.style.display = "none";
        }
    }
    window.onclick = function(event) {
        if (event.target === modal2) {
            modal2.style.display = "none";
        }
    }
</script>
<script>


    function sendData() {
        let oldForm = document.forms.form1;
        let formData = new FormData(oldForm);
        formData.append('postId', number);

        $.ajax({
            type: "POST",
            processData: false,
            contentType: false,
            cache: false,
            url: 'postList',
            data: formData,
            success: function (data) {
                $('#postList').html(data);
            }
        });
    }
    function sendDataComment() {
        let currentForm = document.forms.form2;
        let formData = new FormData(currentForm);
        formData.append('postId', tempForm.get('postId'));

        $.ajax({
            type: "POST",
            processData: false,
            contentType: false,
            cache: false,
            url: 'addComment',
            data: formData,
            success: function (data) {
                $.ajax({
                    url : "postList",
                    success : function(data) {
                        $('#postList').html(data);
                    },
                    error : function() {
                        alert("Error");
                    }
                });
            }
        });
    }
</script>
</body>
</html>




