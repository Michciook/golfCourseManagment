
function mergeRows() {
    var table = document.getElementById('jobs');
    var rows = table.getElementsByTagName('tr');

    var mergedRows = {};

    for (var i = 1; i < rows.length; i++) {
      var cells = rows[i].getElementsByTagName('td');
      var username = cells[0].innerText.trim();
      var description = cells[1].innerText.trim();

      if (!mergedRows[username]) {
        mergedRows[username] = [description];
        rows[i].style.display = 'none';
      } else {
        mergedRows[username].push(description);
        rows[i].style.display = 'none'; 
      }
    }

    for (var username in mergedRows) {
      var newRow = table.insertRow();
      var cellUsername = newRow.insertCell(0);
      var cellDescription = newRow.insertCell(1);

      cellUsername.innerText = username;
      cellDescription.innerText = mergedRows[username].join(', ');
    }
}


window.onload = mergeRows;
