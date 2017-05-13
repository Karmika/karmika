/* 13/05/2017 : START*/

CREATE TABLE `otps` (
  `id` int(11) NOT NULL,
  `mobile` varchar(12) NOT NULL,
  `otp` varchar(7) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


ALTER TABLE `otps`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `otps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

/* END  */