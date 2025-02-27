document.addEventListener("DOMContentLoaded", function () {
    fetchEmployees();

    document.getElementById("employeeForm").addEventListener("submit", function (event) {
        event.preventDefault();
        addEmployee();
    });
});

// Mengambil data employees dari API
function fetchEmployees() {
    fetch("http://localhost/api_se/get_all.php")
        .then(response => response.json())
        .then(data => {
            let table = document.getElementById("employeeTable");
            table.innerHTML = ""; // Kosongkan tabel sebelum menambahkan data baru
            data.forEach(emp => {
                table.innerHTML += `
                    <tr>
                        <td>${emp.employee_id}</td>
                        <td>${emp.name}</td>
                        <td>${emp.email}</td>
                        <td>${emp.division_name}</td>
                        <td>
                            <button onclick="deleteEmployee(${emp.employee_id})">Hapus</button>
                        </td>
                    </tr>
                `;
            });
        })
        .catch(error => console.error("Error fetching employees:", error));
}

// Menambahkan employee baru
function addEmployee() {
    let name = document.getElementById("name").value;
    let email = document.getElementById("email").value;
    let division_id = document.getElementById("division_id").value;

    fetch("http://localhost/api_se/create_employee.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ name, email, division_id })
    })
    .then(response => response.json())
    .then(data => {
        alert(data.message || data.error);
        fetchEmployees(); // Refresh data setelah menambahkan
    })
    .catch(error => console.error("Error adding employee:", error));
}

// Menghapus employee
function deleteEmployee(employee_id) {
    if (!confirm("Apakah Anda yakin ingin menghapus employee ini?")) return;

    fetch("http://localhost/api_se/delete_employee.php", {
        method: "DELETE",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ employee_id })
    })
    .then(response => response.json())
    .then(data => {
        alert(data.message || data.error);
        fetchEmployees(); // Refresh data setelah menghapus
    })
    .catch(error => console.error("Error deleting employee:", error));
}
