var board = document.getElementById('board');
var given_solution=[
    [0, 1, 0, 0, 1, 0, 0, 0],
    [0, 0, 0, 0, 0, 0, 1, 0],
    [0, 0, 1, 0, 0, 1, 0, 0],
    [0, 1, 0, 1, 0, 0, 1, 0],
    [1, 0, 0, 0, 0, 1, 0, 1],
    [0, 1, 0, 0, 1, 0, 0, 0],
    [0, 0, 0, 1, 0, 1, 0, 1],
    [1, 0, 0, 0, 0, 0, 0, 0]
];
var solution=[];
for(var r=0;r<given_solution.length;r++){
    var row = given_solution[r];
    for(var c=0;c<row.length;c++){
        solution.push(row[c].toString());
    }
}
function change(id){
    if(document.getElementById('Check').value === 'Uncheck'){
        document.getElementById('Check').value='Check';
        uncheck();
    }
    this.button = document.getElementById(id);
    this.parent = this.button.parentElement;
    const that = this;
    if(!this.parent.classList.contains('unshaded') && !this.parent.classList.contains('shaded')){
        this.parent.classList.add('unshaded');
        this.button.value = 0;
    }
    else if(this.parent.classList.contains('unshaded')){
        this.parent.classList.remove('unshaded');
        this.parent.classList.add('shaded');
        this.button.value = 1;
    }
    else{
        this.parent.classList.remove('shaded');
        this.button.value = "e";
    }
    scan();
}

function check(){
    if(document.getElementById('Check').value==='Check') {
        document.getElementById('Check').value = 'Uncheck';
        for(var i=0;i<64;i++){
            var id = i.toString();
            this.button = document.getElementById(id);
            var value = this.button.value;
            var answer = solution[i];
            if(value !== "e"){
                if(value === answer){
                    this.button.parentElement.classList.remove('wrong');
                }
                else if(value !== answer){
                    this.button.parentElement.classList.add('wrong');
                }
            }
        }
    }
    else{
        document.getElementById('Check').value='Check';
        uncheck();
    }
}
function give_up(){
    for(var i=0; i<64;i++){
        var id = i.toString();
        document.getElementById(id).value=solution[i];
        if(solution[i] === '0'){
            document.getElementById(id).parentElement.classList.remove('shaded');
            document.getElementById(id).parentElement.classList.add('unshaded');
        }
        else{
            document.getElementById(id).parentElement.classList.add('shaded');
            document.getElementById(id).parentElement.classList.remove('unshaded');
        }
    }
    correct();
}

function scan(){
    var incorrect = 0;
    for(var i=0;i<64;i++){
        var id = i.toString();
        if(document.getElementById(id).value !== solution[i]){
            incorrect+=1;
        }
    }
    if(incorrect===0){
        correct();
    }
}

function correct(){
    document.getElementById('correct').style.display="block";
    document.getElementById('Check').remove();
    document.getElementById('giveup').remove();
}

function uncheck(){
    for(var i=0; i<64;i++){
        var id = i.toString();
        if(document.getElementById(id).parentElement.classList.contains('wrong')){
            document.getElementById(id).parentElement.classList.remove('wrong');
        }
    }
}