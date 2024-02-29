-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 29, 2024 at 03:20 PM
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
  `time_taken` varchar(100) NOT NULL,
  `level` varchar(100) NOT NULL,
  `score` int(11) NOT NULL,
  `result` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attempted_quiz`
--

INSERT INTO `attempted_quiz` (`id`, `studentId`, `student_name`, `topic_unique_id`, `quiz_topic_name`, `time_taken`, `level`, `score`, `result`) VALUES
(1, 1, 'Rushikesh Ghodke', 'sI0M15UO0sKc', 'Html 5', '', '', 10, ''),
(2, 1, 'Rushikesh Ghodke', 'sI0M15UO0sKc', 'Html 5', '', '', 16, '');

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
-- Table structure for table `css_quiz`
--
-- Error reading structure for table smartmind.css_quiz: #1030 - Got error 194 &quot;Tablespace is missing for a table&quot; from storage engine InnoDB
-- Error reading data for table smartmind.css_quiz: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `smartmind`.`css_quiz`&#039; at line 1

-- --------------------------------------------------------

--
-- Table structure for table `html_quiz`
--
-- Error reading structure for table smartmind.html_quiz: #1030 - Got error 194 &quot;Tablespace is missing for a table&quot; from storage engine InnoDB
-- Error reading data for table smartmind.html_quiz: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `smartmind`.`html_quiz`&#039; at line 1

-- --------------------------------------------------------

--
-- Table structure for table `java_quiz`
--
-- Error reading structure for table smartmind.java_quiz: #1030 - Got error 194 &quot;Tablespace is missing for a table&quot; from storage engine InnoDB
-- Error reading data for table smartmind.java_quiz: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `smartmind`.`java_quiz`&#039; at line 1

-- --------------------------------------------------------

--
-- Table structure for table `js_quiz`
--
-- Error reading structure for table smartmind.js_quiz: #1030 - Got error 194 &quot;Tablespace is missing for a table&quot; from storage engine InnoDB
-- Error reading data for table smartmind.js_quiz: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `smartmind`.`js_quiz`&#039; at line 1

-- --------------------------------------------------------

--
-- Table structure for table `python_quiz`
--
-- Error reading structure for table smartmind.python_quiz: #1030 - Got error 194 &quot;Tablespace is missing for a table&quot; from storage engine InnoDB
-- Error reading data for table smartmind.python_quiz: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `smartmind`.`python_quiz`&#039; at line 1

-- --------------------------------------------------------

--
-- Table structure for table `quiz_questions`
--

CREATE TABLE `quiz_questions` (
  `id` int(11) NOT NULL,
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

INSERT INTO `quiz_questions` (`id`, `topic_unique_id`, `topic_name`, `question`, `option1`, `option2`, `option3`, `option4`, `answer`, `marks`) VALUES
(1, 'sI0M15UO0sKc', 'Html 5', 'What does HTML stand for?', 'High-level Textual Markup Language', 'Hyperlink and Text Management Language', 'HyperText Markup Language', 'Hyper Transfer Markup Language', 'HyperText Markup Language', '2'),
(2, 'sI0M15UO0sKc', 'Html 5', 'What does the \"DOCTYPE\" declaration in HTML do?', 'It specifies the background color of the page.', 'It creates a new HTML document.', 'It declares a function in JavaScript.', 'It defines the document type and version of HTML.', 'It defines the document type and version of HTML.', '2'),
(3, 'sI0M15UO0sKc', 'Html 5', 'Which HTML element is used to create a hyperlink?', 'link', 'href', 'a', 'p', 'a', '2'),
(4, 'sI0M15UO0sKc', 'Html 5', 'What does the \"alt\" attribute in the <img> tag provide?', 'It defines the alignment of the image.', 'It specifies the source URL of the image.', 'It provides alternative text for the image.', 'It sets the width of the image.', 'It provides alternative text for the image.', '2'),
(5, 'sI0M15UO0sKc', 'Html 5', 'Which tag is used to define an ordered list in HTML?', 'ul', 'li', 'ol', 'dl', 'ol', '2'),
(6, 'sI0M15UO0sKc', 'Html 5', 'Which HTML element is used to create interactive forms with input fields?', 'input', 'form', 'submit', 'field', 'form', '2'),
(7, 'sI0M15UO0sKc', 'Html 5', 'What is the purpose of the HTML template element?', 'To create a placeholder for deferred scripts', 'To define a template for web components', 'To specify a template for styling elements', 'To define a generic template for any HTML content', 'To define a template for web components', '2'),
(8, 'sI0M15UO0sKc', 'Html 5', 'Which HTML5 attribute is used to provide a short hint that describes the expected value of an input field?', 'hint', 'placeholder', 'description', 'tooltip', 'placeholder', '2'),
(9, 'sI0M15UO0sKc', 'Html 5', 'What is the purpose of the HTML details and summary elements?', 'To define a dropdown menu', 'To create an accordion-style interface', 'To display details that can be toggled open or closed', 'To define a summary for an HTML document', 'To display details that can be toggled open or closed', '2'),
(10, 'sI0M15UO0sKc', 'Html 5', 'In HTML, what does the defer attribute do when included in a script tag?', 'Specifies that the script should be executed in the background', 'Defers the execution of the script until the page is fully loaded', 'Delays the loading of the script until after the page has been parsed', 'Declares the script as deferred and asynchronous', 'Delays the loading of the script until after the page has been parsed', '2'),
(11, 'XDONyJzAZMTR', 'CSS', 'How can you include an external CSS file in an HTML document?', 'style src=\"styles.css\"', 'link rel=\"stylesheet\" type=\"text/css\" href=\"styles.css\"', 'include src=\"styles.css\"', 'css href=\"styles.css\"', 'link rel=\"stylesheet\" type=\"text/css\" href=\"styles.css\"', '2'),
(12, 'XDONyJzAZMTR', 'CSS', 'Which CSS property is used to control the space between the elements border and content?', 'margin property', 'padding property', 'spacing', 'border-spacing', 'padding property', '2'),
(13, 'XDONyJzAZMTR', 'CSS', 'What is the CSS property used for changing the color of the text?', 'font-color', 'text-color', 'color', 'text-style', 'color', '2'),
(14, 'XDONyJzAZMTR', 'CSS', 'Which CSS selector targets all the <p> elements that are children of the element with id \"container\"?', '#container > p', '#container p', '.container > p', '.container p', '#container p', '2'),
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
(30, 'mY3uDxbX9425', 'JavaScript', 'What is the concept of \"hoisting\" in JavaScript?', 'It refers to the process of moving all variable declarations to the top of the code', 'It is a way to prioritize certain functions over others', 'It allows variables to be declared after they are used', 'It is a technique for optimizing code execution', 'It refers to the process of moving all variable declarations to the top of the code', '2');

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
(2, 'XDONyJzAZMTR', 'icons8-css-48.png', 'CSS', '10', '20', ''),
(3, 'mY3uDxbX9425', 'Javascript.png', 'JavaScript', '10', '20', ''),
(4, 'LiZGngXaTKs5', 'Java.png', 'Java', '', '', ''),
(5, 'ZOyskewcj714', '', 'Php', '', '', ''),
(6, 'eLnhFhpylGrt', '', 'Go', '', '', '');

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
(1, 982337, 'Rushikesh', 'Ghodke', '2001-09-19', 'male', 'rushighodke01@gmail.com', '9082600331', 'rushi_19', 'IMG_20210917_210850_999.webp', '$2y$10$VwaeIiMwkW1cwP9SjQeKwOsjvEIq7ePk6BNd8mNinWKRmVgsLPHb2', '2024-02-14 21:13:19', '65ccdf972572c', '2024-02-14 21:18:19', 1),
(2, 796104, 'Saurabh', 'Jadhav', '2003-09-28', 'male', 'saurabhjadhav9642@gmail.com', '8421569642', 'saurabhJ28', 'saurabhjadhav.jpg', '$2y$10$R6YUkjnM9rOxljl8kkrKs.YNxpz7OSlKRxeOdxmsx2TQlBYKZ5pPq', '2024-02-15 08:39:03', '65cd804f92b4d', '2024-02-15 08:44:03', 1),
(3, 505792, 'Prathamesh', 'Khandagale', '2003-12-03', 'male', 'khandagaleprathamesh5@gmail.com', '8855842906', 'prathameshkhandagale258', '', '$2y$10$fnug4EaYzrmTX6B08Jd0Ie69ft/SqCcpwjc0HvamfYsRqDM1xhm1a', '2024-02-15 08:53:27', '65cd83afaed1b', '2024-02-15 08:58:27', 1),
(7, 417385, 'Rushikesh', 'Ghodke', '2001-09-19', 'male', 'rushi.ghodke09@gmail.com', '7485968574', 'rushikeshghodke102', '', '$2y$10$reL0P0aFgGuMSF070wjBZurRSr8E9VUSEBAZG/MwZfxQixDcakXDi', '2024-02-15 19:29:54', '65ce18da01a57', '2024-02-15 19:34:54', 1);

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
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `changepasswordtoken`
--
ALTER TABLE `changepasswordtoken`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `quiz_questions`
--
ALTER TABLE `quiz_questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `quiz_topics`
--
ALTER TABLE `quiz_topics`
  MODIFY `topic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `studentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
