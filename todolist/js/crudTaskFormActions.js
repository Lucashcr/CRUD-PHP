function toggleCreateTaskForm() {
    let createForm = document.getElementById("create-form");
    createForm.hidden = !createForm.hidden;
}

function toggleDeleteTaskForm() {
    let createForm = document.getElementById("delete-form");
    createForm.hidden = !createForm.hidden;
}

function clearCreateTaskForm() {
    document.getElementById("title").value = "";
    document.getElementById("description").value = "";
    document.getElementById("priority").value = "low";
    document.getElementById("deadline").value = "";
    document.getElementById("status").checked = false;
}

function editTask(id) {
    console.log("edit task " + id);
}

function deleteTask(id) {
    console.log("delete task " + id);
}