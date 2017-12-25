$.ajax({

  type: type,
  url: my_url,
  data: formData,
  dataType: 'json',
  success: function (data) {
    console.log(data);

    var task = '<tr id="task' + data.id + '"><td>' + data.id + '</td><td>' + data.task + '</td><td>' + data.description + '</td><td>' + data.created_at + '</td>';
    task += '<td><button class="btn btn-warning btn-xs btn-detail open-modal" value="' + data.id + '">Edit</button>';
    task += '<button class="btn btn-danger btn-xs btn-delete delete-task" value="' + data.id + '">Delete</button></td></tr>';

    if (state == "add"){ //if user added a new record
      $('#tasks-list').append(task);
    }else{ //if user updated an existing record

      $("#task" + task_id).replaceWith( task );
    }

    $('#frmTasks').trigger("reset");

    $('#myModal').modal('hide')
  },
  error: function (data) {
    console.log('Error:', data);
  }
});
});
