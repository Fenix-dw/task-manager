// Открить модальне окно Добавление закладок
var btnOpenAddList = document.querySelector("#open_add_list");
btnOpenAddList.onclick = function() {
	var addListModal = document.querySelector("#addList-modal");
		addListModal.style.display = "block";
}
// Закрить модальне окно Добавление закладок
var addListModalCloseBtn = document.querySelector("#addList-modal .close");
addListModalCloseBtn.onclick = function() {
	var addListModal = document.querySelector("#addList-modal");
		addListModal.style.display = "none";
}
// Открить модальне окно Добавление заданий
var btnOpenAddTask = document.querySelector("#open_add_task");
btnOpenAddTask.onclick = function() {
	var addTaskModal = document.querySelector("#addTask-modal");
		addTaskModal.style.display = "block";
}
// Закрить модальне окно Добавление закладок
var addTaskModalCloseBtn = document.querySelector("#addTask-modal .close");
addTaskModalCloseBtn.onclick = function() {
	var addTaskModal = document.querySelector("#addTask-modal");
		addTaskModal.style.display = "none";
}

//обновление статуса задания
function updateStatusTask(e,status){
	//alert(status);
	var task_status=document.querySelector("input[name='task_status']");

	var taskList=document.querySelector("#task-list-ul");
	var link = e.dataset.link;
	// alert(link);
	// создаем обьект для отправки HTTP запроса
	var ajax= new XMLHttpRequest();
	// console.dir(ajax);
	//открываем ссылку и передаем метод, и саму ссылку
	ajax.open("GET", link, false);
	// отправляем запрос
	ajax.send();
	//обновляем содержимое списка
	taskList.innerHTML=ajax.response;
}

//удаление  задания
function deleteTask(e){
	//alert();
	var taskList=document.querySelector("#task-list-ul");
	var link = e.dataset.link;
	// создаем обьект для отправки HTTP запроса
	var ajax= new XMLHttpRequest()
	console.dir(ajax);
	//открываем ссылку и передаем метод, и саму ссылку
	ajax.open("GET", link, false);
	// отправляем запрос
	ajax.send();
	//обновляем содержимое списка
	taskList.innerHTML=ajax.response;
}

//удаление группы
function deleteGroup(e){
	var groupList=document.querySelector("#task-group-list-ul");
	var taskList=document.querySelector("#task-list-ul");
	var addtask=document.querySelector("#add-task");
	var group_id=document.querySelector("#task-list input[name='group_id']");

	var link = e.dataset.link;
	
	//создаем обьект для отправки HTTP запроса
	var ajax= new XMLHttpRequest();
	//открываем ссылку и передаем метод, и саму ссылку
	ajax.open("GET", link, false);
	// отправляем запрос
	ajax.send();
	//обновляем содержимое списка
	groupList.innerHTML=ajax.response;

	if (link.substring(link.length-2, link.length)==group_id.value) {
		taskList.innerHTML="";
		addtask.remove();
	}
	
}

//форма добавления группы
var add_group_form=document.querySelector("#add_group_form");

//добавление группы
add_group_form.onsubmit = function (e){
	e.preventDefault();
	
	var group_name=add_group_form.querySelector("input[name='group_name']");
	if (group_name.value!="") {
		var sendData ="addGroupBtn=1"+
						"&group_name="+group_name.value;
		// создаем обьект для отправки HTTP запроса
		var ajax= new XMLHttpRequest()
		//открываем ссылку и передаем метод, и саму ссылку
		ajax.open("POST", add_group_form.action, false);

		ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		// отправляем запрос
		ajax.send(sendData);
		console.dir(ajax);
		//обновляем содержимое списка
		var groupList=document.querySelector("#task-group-list-ul");

		groupList.innerHTML=ajax.response;

		group_name.value="";

		addListModalCloseBtn.onclick();
	}
}

//форма добавления задания
var add_task_form=document.querySelector("#add_task_form");

//добавление заданий в группе
add_task_form.onsubmit = function (e){
	var task_name=add_task_form.querySelector("input[name='task_name']");
	e.preventDefault();
	if (task_name.value!="") {
		
		var group_id=add_task_form.querySelector("input[name='group_id']");
		
		var task_description=add_task_form.querySelector("textarea[name='task_description']");
		
		var sendData ="addTaskBtn=1"+
						"&group_id="+group_id.value+
						"&task_name="+task_name.value+
						"&task_description="+task_description.value;

		// создаем обьект для отправки HTTP запроса
		var ajax= new XMLHttpRequest()
		//открываем ссылку и передаем метод, и саму ссылку
		ajax.open("POST", add_task_form.action, false);

		ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		// отправляем запрос
		ajax.send(sendData);
		console.dir(ajax);
		//обновляем содержимое списка
		var taskList=document.querySelector("#task-list-ul");

		taskList.innerHTML=ajax.response;

		task_name.value="";
		task_description.value="";

		addTaskModalCloseBtn.onclick();
	}
}

