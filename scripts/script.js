fetch('../action/get_data.php')
    .then(response => response.json())
    .then(data => {
        // Get the table body element
        const tableBody = document.querySelector('#data-table tbody');

        // Loop through the JSON data and create table rows
        data.forEach(item => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${item.id}</td>
                <td>${item.student_name}</td>
                <td>${item.student_number}</td>
                <td>${item.email}</td>
                <td>${item.description}</td>
                <td><a href="student_details?tid=${item.id}">details</a></td>
            `;
            tableBody.appendChild(row);
        });
    })
    .catch(error => {
        console.error('Error:', error);
    });