var _submit = document.getElementById('_submit'), 
    _file = document.getElementById('_file');
    //_progress = document.getElementById('_progress');

var upload = function(){
    if(_file.files.length === 0){
        return;
    }

    var data = new FormData();
    data.append('SelectedFile', _file.files[0]);
    // console.log(data);
    // console.dir(data);
    var request = new XMLHttpRequest();
    request.onreadystatechange = function(){
        if(request.readyState == 4){
            try {
                var resp = JSON.parse(request.response);
                // console.log(resp);
            } catch (e){
                var resp = {
                    status: 'error',
                    data: 'Unknown error occurred: [' + request.responseText + ']'
                };
            }
            console.log(resp.status + ': ' + resp.data);
        }
    };

    request.upload.addEventListener('progress', function(e){
        _progress.style.width = Math.ceil(e.loaded/e.total) * 100 + '%';
    }, false);

    request.open('POST', 'http://task-manager/upload2.php');
    request.send(data);
    var uploadMsg = document.getElementById('uploadMsg');
    uploadMsg.style.display = 'block'; 
}

_submit.addEventListener('click', upload);

function readURL(input) {
    if (input.files && input.files[0]) {
        var imgName = document.querySelector("#imgName");
        imgName.value=input.files[0]["name"];
        var reader = new FileReader();

        reader.onload = function (e) {
            document.querySelector("#image").setAttribute("src", e.target.result)
        };

        reader.readAsDataURL(input.files[0]);
    }
}

var preImg=document.querySelector("#_file");

preImg.onchange=function(){
    readURL(this);
}