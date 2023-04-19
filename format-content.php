<!DOCTYPE html>
<html lang="en">
    <head>
        <title>MySQL to HTML Table (jQuery, JS, Bootstrap)</title>
        <link href="bootstrap.css" rel="stylesheet">
        <?php include('build-content.php'); ?>
    </head>

    <body>
        <div class="container">
            <div class="content">
                <div class="dashhead">
                    <div class="dashhead-titles">
                        <h6 class="dashhead-subtitle">Example Subheader</h6>
                        <h2 class="dashhead-title">Example Header</h2>
                    </div>
                </div>

                <form id="sort-form" method="post">
                    <input type="text" name="sortBy" hidden></input>
                </form>

                <div class="text-center">
                    <nav>
                        <ul class="pagination">
                            <li class="page-item firstPage">
                                <a class="page-link" href="#" aria-label="First" title="First">
                                <span aria-hidden="true">&laquo;&laquo;</span>
                                <span class="sr-only">First</span>
                                </a>
                            </li>
                            <li class="page-item prevPage">
                                <a class="page-link" href="#" aria-label="Previous" title="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">Previous</span>
                                </a>
                            </li>

                            <ul class="pagination insert-pages"></ul>

                            <li class="page-item nextPage">
                                <a class="page-link" href="#" aria-label="Next" title="Next">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">Next</span>
                                </a>
                            </li>
                            <li class="page-item lastPage">
                                <a class="page-link" href="#" aria-label="Last" title="Last">
                                <span aria-hidden="true">&raquo;&raquo;</span>
                                <span class="sr-only">Last</span>
                                </a>
                            </li>
                        </ul>
                        <div class="dropdown float-right">
                            <button class="btn btn-secondary dropdown-toggle dropdown-format" type="button" id="page-select" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                            <div class="dropdown-menu">
                                <ul class="list-unstyled dropdown-pages"></ul>
                            </div>
                        </div>
                    </nav>
                </div>

                <div class="table-responsive" id="tableContent">
                    <table class="table" id="displayTable" data-sort="table" data-length="<?php echo $table_length; ?>" data-sortHeader="<?php echo $sort_header; ?>" data-sortDirection="<?php echo $sort_direction; ?>">
                        <thead>
                            <tr>
                                <th class="header <?php if ($sort_header == 'example_header_1' && $sort_direction == 'ASC') {
                                    echo 'headerSortDown';
                                } else if ($sort_header == 'example_header_1' && $sort_direction == 'DESC') {
                                    echo 'headerSortUp';
                                } ?>" abbr="example_header_1">Example Header 1</th>
                                <th class="header <?php if ($sort_header == 'example_header_2' && $sort_direction == 'ASC') {
                                    echo 'headerSortDown';
                                } else if ($sort_header == 'example_header_2' && $sort_direction == 'DESC') {
                                    echo 'headerSortUp';
                                } ?>" abbr="example_header_2">Example Header 2</th>
                                <th class="header <?php if ($sort_header == 'example_header_3' && $sort_direction == 'ASC') {
                                    echo 'headerSortDown';
                                } else if ($sort_header == 'example_header_3' && $sort_direction == 'DESC') {
                                    echo 'headerSortUp';
                                } ?>" abbr="example_header_3">Example Header 3</th>
                                <th class="header <?php if ($sort_header == 'example_header_4' && $sort_direction == 'ASC') {
                                    echo 'headerSortDown';
                                } else if ($sort_header == 'example_header_4' && $sort_direction == 'DESC') {
                                    echo 'headerSortUp';
                                } ?>" abbr="example_header_4">Example Header 4</th>
                            </tr>
                        </thead>
                        <tbody id="bodyContent"></tbody>
                    </table>
                </div>

                <div class="text-center">
                    <nav>
                        <ul class="pagination">
                            <li class="page-item firstPage">
                                <a class="page-link" href="#" aria-label="First" title="First">
                                <span aria-hidden="true">&laquo;&laquo;</span>
                                <span class="sr-only">First</span>
                                </a>
                            </li>
                            <li class="page-item prevPage">
                                <a class="page-link" href="#" aria-label="Previous" title="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">Previous</span>
                                </a>
                            </li>

                            <ul class="pagination insert-pages"></ul>

                            <li class="page-item nextPage">
                                <a class="page-link" href="#" aria-label="Next" title="Next">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">Next</span>
                                </a>
                            </li>
                            <li class="page-item lastPage">
                                <a class="page-link" href="#" aria-label="Last" title="Last">
                                <span aria-hidden="true">&raquo;&raquo;</span>
                                <span class="sr-only">Last</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>

        <!-- Note: it is recommended to use proper CDN resources with integrity and crossorigin values. -->
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <script type="text/javascript" src="sorter.js"></script>
        <script type="text/javascript" src="pagination.js"></script>

    </body>
</html>