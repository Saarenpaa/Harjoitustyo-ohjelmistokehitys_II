CREATE TABLE `Comments` (
  `comment_ID` int(11) NOT NULL AUTO_INCREMENT,
  `comment_content` varchar(1500) NOT NULL,
  `comment_date` datetime NOT NULL,
  `comment_img` blob,
  `user_id` int(100) NOT NULL,
  `thread_ID` int(100) NOT NULL,
  PRIMARY KEY (`comment_ID`),
  FOREIGN KEY (`user_id`) REFERENCES `Users` (`user_id`),
  FOREIGN KEY (`thread_ID`) REFERENCES `Threads` (`thread_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;