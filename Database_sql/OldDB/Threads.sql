
CREATE TABLE `Threads` (
  `thread_ID` int(100) NOT NULL AUTO_INCREMENT,
  `thread_topic` varchar(100) NOT NULL,
  `thread_summary` varchar(100) NOT NULL,
  `thread_content` varchar(1500) NOT NULL,
  `thread_date` datetime NOT NULL,
  `thread_img` blob
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `Threads` (`thread_topic`, `thread_summary`, `thread_content`, `thread_date`, `thread_img`, `thread_userID`) VALUES
('Test', 'Test', 'Test', '2021-12-28 17:20:00', '', '6');

ALTER TABLE `Threads`
  ADD PRIMARY KEY (`thread_ID`),
  ADD FOREIGN KEY (`user_id`) REFERENCES `users`(`user_ID`);