-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2024 at 06:01 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smartmind`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminId` int(11) NOT NULL,
  `adminFirstName` varchar(255) NOT NULL,
  `adminLastName` varchar(255) NOT NULL,
  `adminEmail` varchar(255) NOT NULL,
  `adminPassword` varchar(255) NOT NULL,
  `accountCreationDateTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminId`, `adminFirstName`, `adminLastName`, `adminEmail`, `adminPassword`, `accountCreationDateTime`) VALUES
(2, 'Rushikesh', 'Ghodke', 'rushighodke01@gmail.com', '@Rushi19', '2024-02-14 22:22:06');

-- --------------------------------------------------------

--
-- Table structure for table `attempted_quiz`
--

CREATE TABLE `attempted_quiz` (
  `id` int(11) NOT NULL,
  `studentId` int(11) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `topic_unique_id` varchar(255) NOT NULL,
  `quiz_topic_name` varchar(255) NOT NULL,
  `langImages` varchar(255) NOT NULL,
  `level` varchar(100) NOT NULL,
  `score` int(11) NOT NULL,
  `result` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attempted_quiz`
--

INSERT INTO `attempted_quiz` (`id`, `studentId`, `student_name`, `topic_unique_id`, `quiz_topic_name`, `langImages`, `level`, `score`, `result`) VALUES
(1, 4, 'Karan Thorat', 'sI0M15UO0sKc', 'Html 5', 'icons8-html-5-50.png', 'Advance Level', 16, 'Pass'),
(2, 1, 'Rushikesh Ghodke', 'mY3uDxbX9425', 'JavaScript', 'Javascript.png', 'Advance Level', 16, 'Pass'),
(3, 2, 'Saurabh Jadhav', 'sI0M15UO0sKc', 'Html 5', 'icons8-html-5-50.png', 'Intermediate Level', 14, 'Pass'),
(5, 2, 'Saurabh Jadhav', 'XDONyJzAZMTR', 'CSS', 'icons8-css-48.png', 'Intermediate Level', 14, 'Pass'),
(6, 1, 'Rushikesh Ghodke', 'sI0M15UO0sKc', 'Html 5', 'icons8-html-5-50.png', 'Advance Level', 18, 'Pass'),
(7, 3, 'Prathamesh Khandagale', 'sI0M15UO0sKc', 'Html 5', 'icons8-html-5-50.png', 'Intermediate Level', 14, 'Pass'),
(8, 3, 'Prathamesh Khandagale', 'mY3uDxbX9425', 'JavaScript', 'Javascript.png', 'Intermediate Level', 12, 'Pass');

-- --------------------------------------------------------

--
-- Table structure for table `changepasswordtoken`
--

CREATE TABLE `changepasswordtoken` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `verificationToken` varchar(100) NOT NULL,
  `tokenExpirationTime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `changepasswordtoken`
--

INSERT INTO `changepasswordtoken` (`id`, `student_id`, `verificationToken`, `tokenExpirationTime`) VALUES
(1, 2, '65cd8101b338b', '2024-02-15 08:47:01');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_questions`
--

CREATE TABLE `quiz_questions` (
  `question_id` int(11) NOT NULL,
  `topic_unique_id` varchar(15) NOT NULL,
  `topic_name` varchar(255) NOT NULL,
  `question` varchar(255) NOT NULL,
  `option1` varchar(255) NOT NULL,
  `option2` varchar(255) NOT NULL,
  `option3` varchar(255) NOT NULL,
  `option4` varchar(255) NOT NULL,
  `answer` varchar(255) NOT NULL,
  `marks` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quiz_questions`
--

INSERT INTO `quiz_questions` (`question_id`, `topic_unique_id`, `topic_name`, `question`, `option1`, `option2`, `option3`, `option4`, `answer`, `marks`) VALUES
(1, 'sI0M15UO0sKc', 'Html 5', 'What does HTML stand for?', 'High-level Textual Markup Language', 'Hyperlink and Text Management Language', 'HyperText Markup Language', 'Hyper Transfer Markup Language', 'HyperText Markup Language', '2'),
(2, 'sI0M15UO0sKc', 'Html 5', 'What does the \"DOCTYPE\" declaration in HTML do?', 'It specifies the background color of the page.', 'It creates a new HTML document.', 'It declares a function in JavaScript.', 'It defines the document type and version of HTML.', 'It defines the document type and version of HTML.', '2'),
(3, 'sI0M15UO0sKc', 'Html 5', 'Which HTML element is used to create a hyperlink?', 'link', 'href', 'a', 'p', 'a', '2'),
(4, 'sI0M15UO0sKc', 'Html 5', 'What does the \"alt\" attribute in the img tag provide?', 'It defines the alignment of the image.', 'It specifies the source URL of the image.', 'It provides alternative text for the image.', 'It sets the width of the image.', 'It provides alternative text for the image.', '2'),
(5, 'sI0M15UO0sKc', 'Html 5', 'Which tag is used to define an ordered list in HTML?', 'ul', 'li', 'ol', 'dl', 'ol', '2'),
(6, 'sI0M15UO0sKc', 'Html 5', 'Which HTML element is used to create interactive forms with input fields?', 'input', 'form', 'submit', 'field', 'form', '2'),
(8, 'sI0M15UO0sKc', 'Html 5', 'Which HTML5 attribute is used to provide a short hint that describes the expected value of an input field?', 'hint', 'placeholder', 'description', 'tooltip', 'placeholder', '2'),
(10, 'sI0M15UO0sKc', 'Html 5', 'In HTML, what does the defer attribute do when included in a script tag?', 'Specifies that the script should be executed in the background', 'Defers the execution of the script until the page is fully loaded', 'Delays the loading of the script until after the page has been parsed', 'Declares the script as deferred and asynchronous', 'Delays the loading of the script until after the page has been parsed', '2'),
(11, 'XDONyJzAZMTR', 'CSS', 'How can you include an external CSS file in an HTML document?', 'style src=\'styles.css\'', 'link rel=\'stylesheet\' type=\'text/css\' href=\'styles.css\'', 'include src=\'styles.css\'', 'css href=\'styles.css\'', 'link rel=\'stylesheet\'type=\'text/css\' href=\'styles.css\'', '2'),
(12, 'XDONyJzAZMTR', 'CSS', 'Which CSS property is used to control the space between the elements border and content?', 'margin property', 'padding property', 'spacing', 'border-spacing', 'padding property', '2'),
(13, 'XDONyJzAZMTR', 'CSS', 'What is the CSS property used for changing the color of the text?', 'font-color', 'text-color', 'color', 'text-style', 'color', '2'),
(14, 'XDONyJzAZMTR', 'CSS', 'Which CSS selector targets all the \'p\' elements that are children of the element with id \"container\"?', '#container > p', '#container p', '.container > p', '.container p', '#container p', '2'),
(15, 'XDONyJzAZMTR', 'CSS', 'Which CSS property is used to create rounded corners?', 'corner-radius', 'border-radius', 'rounding', 'curve-border', 'border-radius', '2'),
(16, 'XDONyJzAZMTR', 'CSS', 'Which CSS selector would you use to select all even-numbered children of a parent element?', ':nth-child(odd)', ':nth-child(even)', ':even-child', ':even', ':nth-child(even)', '2'),
(17, 'XDONyJzAZMTR', 'CSS', 'What does the CSS property display: flex; do?', 'Makes the element inline', 'Enables the element to be a block-level container', 'Defines a flex container and enables a flex context for all its direct children', 'Sets the element as a table', 'Defines a flex container and enables a flex context for all its direct children', '2'),
(18, 'XDONyJzAZMTR', 'CSS', 'What is the CSS mix-blend-mode property used for?', 'Adjusting the brightness of an element', 'Blending the color of an element with its background', 'Mixing two background images', 'Modifying the opacity of an element', 'Blending the color of an element with its background', '2'),
(19, 'XDONyJzAZMTR', 'CSS', 'What is the purpose of the CSS flex-grow property?', 'Determines the size of a flex item', 'Specifies the maximum size of a flex item', 'Controls the growth of a flex containers children', 'Adjusts the spacing between flex items', 'Controls the growth of a flex containers children', '2'),
(20, 'XDONyJzAZMTR', 'CSS', 'Which CSS feature allows for the creation of complex shapes and layouts with non-rectangular, or even curved, shapes?', 'CSS Transforms', 'CSS Shapes', 'CSS Grid Layout', 'CSS Flexbox', 'CSS Shapes', '2'),
(21, 'mY3uDxbX9425', 'JavaScript', 'Which keyword is used to declare a variable in JavaScript?', 'let', 'const', 'var', 'variable', 'var', '2'),
(22, 'mY3uDxbX9425', 'JavaScript', 'What is the purpose of the typeof operator in JavaScript?', 'To check if a variable is defined', 'To determine the type of a variable or expression', 'To create a new variable', 'To compare two values', 'To determine the type of a variable or expression', '2'),
(23, 'mY3uDxbX9425', 'JavaScript', 'What is the purpose of the this keyword in JavaScript?', 'Refers to the current function', 'Refers to the current instance of an object', 'Refers to the global object', 'Refers to the parent object', 'Refers to the current instance of an object', '2'),
(24, 'mY3uDxbX9425', 'JavaScript', 'Which method is used to add an element at the end of an array in JavaScript?', 'append()', 'add()', 'push()', 'insert()', 'push()', '2'),
(25, 'mY3uDxbX9425', 'JavaScript', 'What is the difference between == and === in JavaScript?', 'They are interchangeable and have the same meaning', '== performs a strict equality check, while === performs type coercion', 'They both perform a shallow comparison of objects', '=== performs a strict equality check, while == performs type coercion', '=== performs a strict equality check, while == performs type coercion', '2'),
(26, 'mY3uDxbX9425', 'JavaScript', 'What is the purpose of the async keyword in JavaScript?', 'It indicates that the function should be executed asynchronously', 'It specifies that the function returns a Promise', 'It defines a function as an asynchronous function', 'It declares a variable as asynchronous', 'It defines a function as an asynchronous function', '2'),
(27, 'mY3uDxbX9425', 'JavaScript', 'How does the let keyword differ from var in JavaScript?', 'let is block-scoped, while var is function-scoped', 'let is function-scoped, while var is block-scoped', 'There is no difference between let and var', 'let is used for global variables, while var is used for local variables', 'let is block-scoped, while var is function-scoped', '2'),
(28, 'mY3uDxbX9425', 'JavaScript', 'What is the purpose of the JavaScript map function?', 'To create a new array with the results of calling a provided function on every element in the array', 'To filter elements in an array based on a provided function', 'To reduce an array to a single value', 'To iterate over the elements of an array', 'To create a new array with the results of calling a provided function on every element in the array', '2'),
(29, 'mY3uDxbX9425', 'JavaScript', 'How does the JavaScript async/await syntax simplify asynchronous code?', 'It replaces callbacks with synchronous code', 'It automatically handles errors in asynchronous code', 'It allows asynchronous code to be written in a more synchronous style', 'It prevents the execution of multiple asynchronous operations simultaneously', 'It allows asynchronous code to be written in a more synchronous style', '2'),
(30, 'mY3uDxbX9425', 'JavaScript', 'What is the concept of \"hoisting\" in JavaScript?', 'It refers to the process of moving all variable declarations to the top of the code', 'It is a way to prioritize certain functions over others', 'It allows variables to be declared after they are used', 'It is a technique for optimizing code execution', 'It refers to the process of moving all variable declarations to the top of the code', '2'),
(32, 'sI0M15UO0sKc', 'Html 5', 'What is the purpose of the HTML canvas element?', 'It is used for drawing graphics using JavaScript.', 'It defines a container for metadata.', 'It creates a table in HTML.', 'It defines a section in a document.', 'It is used for drawing graphics using JavaScript.', '2'),
(33, 'sI0M15UO0sKc', 'Html 5', 'What is the purpose of the HTML template element?', 'To define a template for web components', 'To create a placeholder for deferred scripts', 'To specify a template for styling elements', 'To define a generic template for any HTML content', 'To define a template for web components', '2'),
(34, 'LiZGngXaTKs5', 'Java', 'Which of the following is the correct way to declare a variable in Java?', 'variable x;', 'int x;', 'declare x;', 'x = int;', 'int x;', '2'),
(36, 'LiZGngXaTKs5', 'Java', 'Which keyword is used to define a constant in Java?', 'final', 'immutable', 'const', 'constant', 'const', '2'),
(37, 'LiZGngXaTKs5', 'Java', 'What does the toString() method do in Java?', 'Converts a string to lowercase', 'Converts an object to a string', 'Converts a string to uppercase', 'Converts a number to a string', 'Converts an object to a string', '2'),
(38, 'LiZGngXaTKs5', 'Java', 'What is the difference between == and .equals() when comparing objects in Java?', '== compares object references, while .equals() compares the contents of objects', 'They are equivalent and can be used interchangeably', '.equals() is used for primitive data types, and == is used for objects', '.equals() is a syntax error in Java', '== compares object references, while .equals() compares the contents of objects', '2'),
(39, 'LiZGngXaTKs5', 'Java', 'Which of the following Java features is used for achieving multiple inheritance?', 'Abstract classes', 'Interfaces', 'Pacakages', 'Enum', 'Interfaces', '2'),
(40, 'LiZGngXaTKs5', 'Java', 'What is the purpose of the Comparable interface in Java?', 'It is used for comparing primitive data types', 'It allows a class to implement custom ordering for objects', 'It provides methods for comparing arrays', 'It is used for serializing objects', 'It allows a class to implement custom ordering for objects', '2'),
(41, 'LiZGngXaTKs5', 'Java', 'Which design pattern is used to define a family of algorithms, encapsulate each algorithm, and make them interchangeable?', 'Strategy Pattern', 'Observer Pattern', 'Singleton Pattern', 'Builder Pattern', 'Strategy Pattern', '2'),
(42, 'LiZGngXaTKs5', 'Java', 'How does Java handle multiple inheritance?', 'Java supports multiple inheritance through the use of the extends keyword', 'Java supports multiple inheritance through the use of interfaces', 'Java does not support multiple inheritance', 'Java supports multiple inheritance through the use of the implements keyword', 'Java supports multiple inheritance through the use of interfaces', '2'),
(43, 'LiZGngXaTKs5', 'Java', 'What does the this keyword refer to in Java?', 'It refers to the current instance of the class', 'It is used to create a new instance of a class', 'It refers to the superclass of the current class', 'It is a reserved keyword and has no specific purpose', 'It refers to the current instance of the class', '2'),
(44, 'LiZGngXaTKs5', 'Java', 'What is the difference between ArrayList and LinkedList in Java?', 'ArrayList is implemented as a linked list, while LinkedList is implemented as an array', 'ArrayList is a resizable array, and LinkedList is a doubly-linked list', 'ArrayList is faster for random access, while LinkedList is faster for insertions and deletions', 'ArrayList is a fixed-size array, and LinkedList can dynamically grow or shrink', 'ArrayList is a resizable array, and LinkedList is a doubly-linked list', '2');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_topics`
--

CREATE TABLE `quiz_topics` (
  `topic_id` int(11) NOT NULL,
  `topicUniqueId` varchar(50) NOT NULL,
  `langImages` varchar(255) NOT NULL,
  `topic_name` varchar(255) NOT NULL,
  `questions` varchar(100) NOT NULL,
  `marks` varchar(50) NOT NULL,
  `quiz_time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quiz_topics`
--

INSERT INTO `quiz_topics` (`topic_id`, `topicUniqueId`, `langImages`, `topic_name`, `questions`, `marks`, `quiz_time`) VALUES
(1, 'sI0M15UO0sKc', 'icons8-html-5-50.png', 'Html 5', '10', '20', ''),
(2, 'XDONyJzAZMTR', 'icons8-css-48.png', 'CSS 3', '10', '20', ''),
(3, 'mY3uDxbX9425', 'Javascript.png', 'JavaScript', '10', '20', ''),
(4, 'LiZGngXaTKs5', 'Java.png', 'Java', '10', '20', ''),
(5, 'ZOyskewcj714', '', 'Php', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `studentId` int(11) NOT NULL,
  `studentUniqueId` int(11) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `dateOfBirth` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobileNumber` varchar(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `studentImage` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `accountCreationDateTime` datetime NOT NULL,
  `verificationToken` varchar(255) NOT NULL,
  `tokenExpirationTime` datetime DEFAULT NULL,
  `isVerified` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`studentId`, `studentUniqueId`, `firstName`, `lastName`, `dateOfBirth`, `gender`, `email`, `mobileNumber`, `username`, `studentImage`, `password`, `accountCreationDateTime`, `verificationToken`, `tokenExpirationTime`, `isVerified`) VALUES
(1, 132206, 'Rushikesh', 'Ghodke', '0201-09-19', 'male', 'rushighodke01@gmail.com', '9082600331', 'rushi_19', 'IMG_20210917_210850_999.webp', '$2y$10$F0nBxw2tOgKjqCk6sbUha.mFxZnwNYPootrIy0XLUvmA85STzOyqu', '2024-03-02 09:36:33', '65e2a5c9eeafd', '2024-03-02 09:41:33', 1),
(2, 526567, 'Saurabh', 'Jadhav', '2003-09-28', 'male', 'saurabhjadhav9642@gmail.com', '8421569642', 'saurabhjadhav346', 'saurabhjadhav.jpg', '$2y$10$QtkKXBbFr6h/xyKaE3SBKOHBV3.5UYpn6JwK/oWgipdinr9NJqB7C', '2024-03-02 09:47:53', '65e2a8711ce37', '2024-03-02 09:52:53', 1),
(3, 646520, 'Prathamesh', 'Khandagale', '2003-12-03', 'male', 'khandagaleprathamesh5@gmail.com', '8855842905', 'prathamesh_45', 'WhatsApp Image 2024-03-02 at 09.56.29_24772614.jpg', '$2y$10$5OLwW.uXNvwexxyYvtsl/eMl7AOMmg8tEf2Yl0FuagbD1pHxC/n/G', '2024-03-02 09:53:03', '65e2a9a7c8287', '2024-03-02 09:58:03', 1),
(4, 830703, 'Karan', 'Thorat', '2003-04-18', 'male', 'karanthorat184@gmail.com', '7277686060', 'karanthorat988', 'IMG_9219.jpg', '$2y$10$yNJELXBdHFLQj/A7sjSBpOt8b1yfdmWZHD7uWMKI66PXQd/WwPKMq', '2024-03-02 10:12:38', '65e2ae3e7206e', '2024-03-02 10:17:38', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `attempted_quiz`
--
ALTER TABLE `attempted_quiz`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `changepasswordtoken`
--
ALTER TABLE `changepasswordtoken`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_questions`
--
ALTER TABLE `quiz_questions`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `quiz_topics`
--
ALTER TABLE `quiz_topics`
  ADD PRIMARY KEY (`topic_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`studentId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `attempted_quiz`
--
ALTER TABLE `attempted_quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `changepasswordtoken`
--
ALTER TABLE `changepasswordtoken`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `quiz_questions`
--
ALTER TABLE `quiz_questions`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `quiz_topics`
--
ALTER TABLE `quiz_topics`
  MODIFY `topic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `studentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
