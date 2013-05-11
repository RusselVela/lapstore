// JavaScript Document


function show(bloq,postId) {
    obj = document.getElementById(bloq);
    obj.style.display = (obj.style.display=='none') ? 'block' : 'none';
    document.getElementById("comen_post"+postId).focus();
}