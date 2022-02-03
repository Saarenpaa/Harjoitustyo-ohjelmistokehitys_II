CREATE TABLE `users` (
  `user_ID` int(100) NOT NULL,
  `user_firstname` varchar(20) NOT NULL,
  `user_lastname` varchar(20) NOT NULL,
  `password` varchar(60) NOT NULL,
  `user_email` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE utf8mb4_unicode_ci;


INSERT INTO `users` (`user_id`, `user_firstname`, `user_lastname`, `password`, `user_email`) VALUES
(1, 'Joonas', 'Saarenpää', 'Joonas', 'e2001398@edu.vamk.fi')

ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

ALTER TABLE `users`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;