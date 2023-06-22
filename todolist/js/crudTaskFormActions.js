function toggleTaskForm(method) {
    let form = document.getElementById(`${method}-form`);
    form.hidden = !form.hidden;
}

function clearTaskForm(form) {
    document.getElementById(`${form}-title`).value = "";
    document.getElementById(`${form}-description`).value = "";
    document.getElementById(`${form}-priority`).value = "low";
    document.getElementById(`${form}-deadline`).value = "";
    document.getElementById(`${form}-status`).checked = false;
}

function fillTaskForm(form, id) {
    console.log(form);
    document.getElementById(`${form}-id`).value = id;
    fetch(window.location.origin + "/src/get_task.php?id=" + id)
        .then(response => response.json())
        .then(task => {
            document.getElementById(`${form}-title`).value = task.title;
            document.getElementById(`${form}-description`).value = task.description;
            document.getElementById(`${form}-priority`).value = task.priority;
            document.getElementById(`${form}-deadline`).value = task.deadline;
            document.getElementById(`${form}-status`).checked = task.status;
        });
    toggleTaskForm(form);
}

function deleteTask(id) {
    document.getElementById("delete-id").value = id;
    fetch(window.location.origin + "/src/get_task.php?id=" + id)
        .then(response => response.json())
        .then(task => {
            document.getElementById("delete-title").value = task.title;
            document.getElementById("delete-description").value = task.description;
            document.getElementById("delete-priority").value = task.priority;
            document.getElementById("delete-deadline").value = task.deadline;
            document.getElementById("delete-status").value = task.status;
        });
    toggleTaskForm('delete');
}