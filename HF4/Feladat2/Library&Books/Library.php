<?php
namespace Library;
use Exception;



require_once "AbstractLibrary.php";
require_once "Author.php"; 
require_once "Book.php";

class Library extends AbstractLibrary
{
    private array $authors = [];

    public function addAuthor(string $authorName): Author
    {
        
        if (isset($this->authors[$authorName])) {
            return $this->authors[$authorName];
        }
    
        
        $author = new Author($authorName);
        $this->authors[$authorName] = $author;
        return $author;
    }

    
    public function addBookForAuthor($authorName, Book $book)
    {
        if (isset($this->authors[$authorName])) {
            $author = $this->authors[$authorName];
            $author->addBook($book->getTitle(), $book->getPrice());
            $book->setAuthor($author);
        }
    }

    
    public function getBooksForAuthor($authorName)
    {
        if (isset($this->authors[$authorName])) {
            return $this->authors[$authorName]->getBooks();
        }
        return [];
    }

    
    public function search(string $bookName): Book
    {
        foreach ($this->authors as $author) {
            foreach ($author->getBooks() as $book) {
                if ($book->getTitle() === $bookName) {
                    return $book;
                }
            }
        }
        throw new \Exception("Book not found.");
    }

    
    public function print()
    {
        foreach ($this->authors as $author) {
            echo $author->getName() . "<br>";
            echo "----------------------<br>";
            foreach ($author->getBooks() as $book) {
                echo $book->getTitle() . " - " . $book->getPrice() . "<br>";
            }
            echo "<br>";
        }
    }
}
