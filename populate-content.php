<?php include('db-connect.php');

if (isset($_POST['sortHeader']) && isset($_POST['sortDirection'])) {
    $sort_header = $_POST['sortHeader'];
    $sort_direction = $_POST['sortDirection'];
} else {
    // Default sort
    $sort_header = 'example_header_1';
    $sort_direction = 'DESC';
}

if (isset($_POST['page'])) {
    $page = $results_per_page * ($_POST['page']);
} else {
    // Defaults to the first page
    $page = 0;
}

if (isset($_POST['perPage'])) {
    $results_per_page = $_POST['perPage'];
} else {
    // Defaults to 10 results shown
    $results_per_page = 10;
}

// Check for sort direction. ASC and DESC cannot be used in bind_param()
if ($sort_direction == 'ASC') {
    $query = "SELECT * FROM `example_table`
        ORDER BY `?` ASC
        LIMIT ?, ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('sii', $sort_header, $page, $results_per_page);
} else {
    $query = "SELECT * FROM `example_table`
        ORDER BY `?` DESC
        LIMIT ?, ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('sii', $sort_header, $page, $results_per_page);
}

$stmt->execute();
$result = $stmt->get_result();

$tableHTML = '';

while($row = mysqli_fetch_array($result)) {
    $tableHTML.='<tr><td class="created-table">'.$row['example_header_1'].'</td>
    <td class="created-table">'.$row['example_header_2'].'</td>
    <td class="created-table">'.$row['example_header_3'].'</td>
    <td class="created-table">'.$row['example_header_4'].'</td></tr>';
}

echo $tableHTML;

$stmt->free_result();
$stmt->close();

$conn->close();

//EOF
