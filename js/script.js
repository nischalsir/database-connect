document.getElementById('userForm').addEventListener('submit', function(event) {
    event.preventDefault();
  
    const formData = new FormData(this);
  
    fetch('insert_read.php', {
      method: 'POST',
      body: formData
    })
    .then(response => response.json())
    .then(data => {
      if (data.status === "success") {
        toastr.success(data.message, 'Success');
        loadUsers();
      } else {
        toastr.error(data.message, 'Error');
      }
    })
    .catch(error => {
      toastr.error('Failed to add user', 'Error');
    });
  });
