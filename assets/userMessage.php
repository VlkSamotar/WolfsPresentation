<?php if(isset($_SESSION["success"]) and $_SESSION["success"] != ""): ?>    
    <div class="messageBox" id="messageBoxTimer">
        <div class="iconsDiv" id="icons">
            <img class="crossIcon" id="icon" src="./img/crossMenu.png" alt="Hamburger">
        </div>
        <div class="background"></div>
        <p><?= $_SESSION["success"] ?></p>
    </div>
    <?php $_SESSION["success"] = ""; ?>   
<?php endif; ?>