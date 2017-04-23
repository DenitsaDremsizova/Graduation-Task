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



function addLang(id)
{
	var langId = document.getElementById('addLang').value;
	var xhr = initAjax('../controller/AboutController.php', 'POST');
	xhr.send('addLang=' + id + '#' + langId);
	xhr.onload =  function() {
		if (xhr.status == 200) {
			location.reload();
		}
	}
}
function addInterest(id)
{
	var interest = document.getElementById('addInterest').value;
	var xhr = initAjax('../controller/AboutController.php', 'POST');
	xhr.send('addInterest='+ id + '#' + interest);
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

function addExperience(id) {
	var company = document.getElementById('company').value;
	var position = document.getElementById('position').value;
	var startDate = document.getElementById('startDate').value;
	var endDate = document.getElementById('endDate').value;
	var content = id + "#" + company + "#" + position + "#" + startDate + "#" + endDate;
	var xhr = initAjax('../controller/AboutController.php', 'POST');
	xhr.send('experience=' + content);
	xhr.onload =  function() {
		if (xhr.status == 200) {
			location.reload();
		}
	}
}



