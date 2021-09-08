document.getElementById('burger').addEventListener('click', function(){
    document.getElementById('cross').style.display = 'block';
    document.getElementById('burger').style.display = 'none';
    document.querySelector('header nav').className = 'opened';

});

document.getElementById('cross').addEventListener('click', function(){
    document.getElementById('cross').style.display = 'none';
    document.getElementById('burger').style.display = 'block';
    document.querySelector('header nav').className = '';
});