function mergeRows() {
    var table = document.getElementById('jobs');
    var rows = table.getElementsByTagName('tr');
  
    var mergedRows = {};
  
    for (var i = 1; i < rows.length; i++) {
      var cells = rows[i].getElementsByTagName('td');
      var username = cells[0].innerText.trim();
      
      // Assuming date is in the third column with format 'YYYY-MM-DD HH:MM:SS'
      var fullDate = cells[2].innerText.trim();
      var dateOnly = fullDate.split(' ')[0]; // Extracting date part
  
      var description = cells[1].innerText.trim();
  
      var key = username + '_' + dateOnly;
  
      if (!mergedRows[key]) {
        mergedRows[key] = [description];
        rows[i].style.display = 'none';
      } else {
        mergedRows[key].push(description);
        rows[i].style.display = 'none'; 
      }
    }
  
    for (var key in mergedRows) {
      var newRow = table.insertRow();
      var cellUsername = newRow.insertCell(0);
      var cellDescription = newRow.insertCell(1);
      var cellDate = newRow.insertCell(2); // Add a cell for the date
  
      var parts = key.split('_');
      cellUsername.innerText = parts[0];
      cellDate.innerText = parts[1]; // Set the date cell
      cellDescription.innerText = mergedRows[key].join(', ');
    }
  }
  
  window.onload = mergeRows;