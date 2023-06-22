const tasksTBody = document.getElementById("tasks-tbody");

$("#create-form").on("submit", (event) => {
    event.preventDefault();

    let newTask = {
        title: $("#create-title").val(),
        description: $("#create-description").val(),
        priority: $("#create-priority").val(),
        deadline: $("#create-deadline").val().replace("T", " "),
        status: $("#create-status").is(":checked") ? 1 : 0 
    }

    $.ajax({
        url: window.location.origin + "/src/create_task.php",
        method: "POST",
        data: newTask,
        dataType: "json"
    }).done((response) => {
        toggleTaskForm('create');
        clearTaskForm('create');
        tasksTBody.insertAdjacentHTML('beforeend', response);
    }).fail((response) => {
        console.log(response.responseText);
    });
});

$("#delete-form").on("submit", (event) => {
    event.preventDefault();

    let id = $("#delete-id").val();

    $.ajax({
        url: window.location.origin + "/src/delete_task.php?id=" + id,
        method: "POST",
        data: { id: id },
        dataType: "json"
    }).done((response) => {
        $(`#task-${id}`).remove();
    });
    
    toggleTaskForm('delete');
    clearTaskForm('delete');
});