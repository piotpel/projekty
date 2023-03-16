$(".borrow").click(function () {
    var $row = $(this).closest("tr");    // Znalezienie wiersza
    var $bookid = $row.find(".bookId").text(); // Znalezienie wartości z wiersza
    document.getElementById("book_id").value = $bookid; //Przypisanie wartości
    var $title = $row.find(".title").text();
    document.getElementById("book_title").value = $title;
    var $author = $row.find(".author").text(); 
    document.getElementById("book_author").value = $author;
});