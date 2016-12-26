/*global $*/
$(document).ready(function(){
    $("#btn-login").on("click",function(){
        $.post("controller/casePost.php",$("#form_login").serialize(),function(data){
            console.log(data)
        })
        return false;
    })
})