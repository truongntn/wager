
## Screenshot

Please review all screens in "screenshots" folder

## Database script

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `wager`
--
CREATE DATABASE IF NOT EXISTS `wager` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `wager`;

-- --------------------------------------------------------

--
-- Table structure for table `wager`
--

DROP TABLE IF EXISTS `wager`;
CREATE TABLE `wager` (
  `id` int(11) NOT NULL,
  `total_wager_value` int(11) NOT NULL DEFAULT '0',
  `odds` int(11) NOT NULL DEFAULT '0',
  `selling_percentage` int(11) NOT NULL DEFAULT '0',
  `selling_price` decimal(10,0) NOT NULL DEFAULT '0',
  `current_selling_price` decimal(10,0) NOT NULL DEFAULT '0',
  `percentage_sold` int(11) DEFAULT '0',
  `amount_sold` int(11) DEFAULT '0',
  `placed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `wager_buying`
--

DROP TABLE IF EXISTS `wager_buying`;
CREATE TABLE `wager_buying` (
  `id` int(11) NOT NULL,
  `wager_id` int(11) NOT NULL,
  `buying_price` decimal(10,0) NOT NULL DEFAULT '0',
  `bought_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `wager`
--
ALTER TABLE `wager`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wager_buying`
--
ALTER TABLE `wager_buying`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `wager`
--
ALTER TABLE `wager`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wager_buying`
--
ALTER TABLE `wager_buying`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;
