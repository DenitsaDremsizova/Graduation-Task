function initAjax(url, method)
{
	var xhr = new XMLHttpRequest();
	xhr.open(method, url, true);
	
	return xhr;
}

function deleteLanguage(id) {
	var xhr = initAjax('../controller/AboutController.php', 'DELETE');
	xhr.send('LangId='+id);
	
	xhr.onload =  function() {
		if (xhr.status == 200) {
			location.reload();
		}
	}
}
function deleteInterest(interest) {
	var xhr = initAjax('../controller/AboutController.php', 'DELETE');
	xhr.send('interest=' + interest);
	
	xhr.onload =  function() {
		if (xhr.status == 200) {
			location.reload();
		}
	}
}

function editOrDeleteInfo(id,Info) {
	var xhr = initAjax('../controller/AboutController.php', 'POST');
	xhr.send('info=' + id + '#' + Info);
	
	xhr.onload =  function() {
		if (xhr.status == 200) {
			location.reload();
		}
	}
}
function deleteInfo(id) {
	editOrDeleteInfo(id,'');
}
function editInfo (id) {
	var info = document.getElementById('userInfo').value;
	editOrDeleteInfo(id,info)
}



function addLang()
{
	var langId = document.getElementById('addLang').value;
	var xhr = initAjax('../controller/AboutController.php', 'POST');
	xhr.send('addLang=' + langId);
	xhr.onload =  function() {
		if (xhr.status == 200) {
			location.reload();
		}
	}
}
function addInterest()
{
	var interest = document.getElementById('addInterest').value;
	var xhr = initAjax('../controller/AboutController.php', 'POST');
	xhr.send('addInterest=' + interest);
	xhr.onload =  function() {
		if (xhr.status == 200) {
			location.reload();
		}
	}
}
function deleteWorkExperience(workExperience) {
	var xhr = initAjax('../controller/AboutController.php', 'DELETE');
	xhr.send('experience=' + workExperience);
	
	xhr.onload =  function() {
		if (xhr.status == 200) {
			location.reload();
		}
	}
}



