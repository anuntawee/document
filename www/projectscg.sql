-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2024 at 05:32 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectscg`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_dev`
--

CREATE TABLE `tb_dev` (
  `dev_id` int(11) NOT NULL,
  `dev_name` varchar(255) NOT NULL,
  `devstart` date NOT NULL,
  `devend` date NOT NULL,
  `dev_startname` varchar(255) NOT NULL,
  `dev_workstart` date NOT NULL,
  `dev_workend` date NOT NULL,
  `dev_work_name2` varchar(255) NOT NULL,
  `dev_project_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_doc`
--

CREATE TABLE `tb_doc` (
  `doc_id` int(11) NOT NULL,
  `doc_name` varchar(255) NOT NULL,
  `doc_path` varchar(255) NOT NULL,
  `doc_status` varchar(255) NOT NULL,
  `doc_version` int(11) NOT NULL,
  `doc_project_name` varchar(255) NOT NULL,
  `doc_template` varchar(255) NOT NULL,
  `doc_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_end`
--

CREATE TABLE `tb_end` (
  `end_id` int(11) NOT NULL,
  `end_name` varchar(255) NOT NULL,
  `endstart` date NOT NULL,
  `endend` date NOT NULL,
  `end_startname` varchar(255) NOT NULL,
  `end_workstart` date NOT NULL,
  `end_workend` date NOT NULL,
  `end_work_name2` varchar(255) NOT NULL,
  `end_project_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_get`
--

CREATE TABLE `tb_get` (
  `get_id` int(11) NOT NULL,
  `get_name` varchar(255) NOT NULL,
  `getstart` date NOT NULL,
  `getend` date NOT NULL,
  `get_statname` varchar(255) NOT NULL,
  `get_workstart` date NOT NULL,
  `get_workend` date NOT NULL,
  `get_work_name2` varchar(255) NOT NULL,
  `get_project_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_internal`
--

CREATE TABLE `tb_internal` (
  `internal_id` int(11) NOT NULL,
  `internal_name` varchar(255) NOT NULL,
  `internalstart` date NOT NULL,
  `internalend` date NOT NULL,
  `internal_startname` varchar(255) NOT NULL,
  `internal_workstart` date NOT NULL,
  `internal_workend` date NOT NULL,
  `internal_work_name2` varchar(255) NOT NULL,
  `internal_project_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_member`
--

CREATE TABLE `tb_member` (
  `member_id` int(11) NOT NULL,
  `member_name` varchar(255) NOT NULL,
  `member_lastname` varchar(255) NOT NULL,
  `member_email` varchar(255) NOT NULL,
  `member_pass` varchar(255) NOT NULL,
  `member_role` varchar(255) NOT NULL,
  `member_view` int(11) NOT NULL,
  `member_comment` int(11) NOT NULL,
  `member_edits` int(11) NOT NULL,
  `member_approve` int(11) NOT NULL,
  `member_signoff` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_member`
--

INSERT INTO `tb_member` (`member_id`, `member_name`, `member_lastname`, `member_email`, `member_pass`, `member_role`, `member_view`, `member_comment`, `member_edits`, `member_approve`, `member_signoff`) VALUES
(3, 'Sakol', 'Sukchaona', 'sakol.s@merudy.com', 'admin', 'Lead Project', 1, 1, 1, 1, 1),
(4, 'Ditthita', 'Tobuengkok', 'Ditthita.t@merudy.com', 'admin', 'Senior Project Manager', 1, 1, 0, 1, 0),
(5, 'Sinsupa', 'Srithao', 'sinsupa.s@merudy.com', 'admin', 'Senior Project Manager', 1, 0, 1, 0, 0),
(6, 'Wasinee', 'Dokmai', 'wasinee.d@merudy.com', 'admin', 'Senior Project Manager', 1, 0, 1, 0, 0),
(7, 'Kanyaporn ', 'Makonkhan', 'yardfon.s@merudy.com', 'admin', 'Project Manager', 1, 0, 0, 0, 0),
(8, 'Sergio', 'Rattanakapong', 'sergio.r@merudy.com', 'admin', 'Project Manager', 0, 1, 0, 0, 0),
(9, 'Sasichom', 'Ritbanrueng', 'sasichom.r@merudy.com', 'admin', 'Project Manager', 1, 0, 0, 0, 0),
(10, 'Kanyaporn', 'Makonkhan', 'kanyaporn.m@merudy.com', 'admin', 'Assistant Project Manage', 1, 0, 0, 0, 0),
(11, 'Karachakay', 'Intarasuwan', 'karachakay.i@merudy.com', 'admin', 'Project Coordinator', 1, 1, 0, 0, 0),
(12, 'Sukrit', 'Anu', 'sukrit.a@merudy.com', 'admin', 'Project Coordinator', 0, 0, 0, 0, 0),
(13, 'Kanokwan ', 'Rueanthai', 'Kanokwan.r@merudy.com', 'admin', 'Project Coordinator', 0, 0, 0, 0, 0),
(14, 'Pramisa', 'Aiemanan', 'Pramisa.a@merudy.com', 'admin', 'Project Coordinator', 0, 0, 0, 0, 0),
(15, 'Thanapon', 'Cheaychom', 'thanapon.c@merudy.com', 'admin', 'Senior Developer', 0, 0, 0, 0, 0),
(16, 'Thanteewarit', 'Toomkaw', 'thanteewarit.t@merudy.com', 'admin', 'Bussiness Analyze', 0, 0, 0, 0, 0),
(17, 'Suchart', 'Chokphichitchai', 'suchart.c@merudy.com', 'admin', 'System Analyze', 0, 0, 0, 0, 0),
(18, 'Nopwichai', 'Yanasoi', 'Nopwichai.y@merudy.com', 'admin', 'Dev-Ops Engineer', 0, 0, 0, 0, 0),
(19, 'Worawat', 'Chaithi', 'worawat.c@merudy.com', 'admin', 'Data Engineer', 1, 0, 0, 0, 0),
(20, 'Watchara', 'Noisriphan', 'watchara.n@merudy.com', 'admin', 'Data Engineer & AI/ML', 0, 0, 0, 0, 0),
(21, 'Watchara', ' kasuriya', 'Sirakalp.k@merudy.com', 'admin', 'Tester', 0, 0, 0, 0, 0),
(22, 'Kitsada ', 'Nueangbunyuen', 'kitsada.n@merudy.com', 'admin', 'Lead UX/UI Designer', 0, 0, 0, 0, 0),
(23, 'Nontawat', 'Palwisut', 'nontawat.p@merudy.com', 'admin', 'CO-Founder COO', 0, 0, 0, 0, 0),
(24, 'Puttipong', 'Sirishodok', 'puttipong.s@merudy.com', 'admin', 'Founder CEO', 0, 0, 0, 0, 0),
(25, 'Khornkhaew', 'Lersmethasakul', 'khornkhaew.l@merudy.com', 'admin', 'Founder CFO', 0, 0, 0, 0, 0),
(26, 'Worachat', 'Nuengchamnong', 'worachat.n@merudy.com', 'admin', 'Founder CIO', 0, 0, 0, 0, 0),
(27, 'Thanawan', 'Sittiwong', 'Thanawan.s@merudy.com', 'admin', 'ADMIN', 0, 0, 0, 0, 0),
(29, 'admin', 'admin', 'admin', 'admin', 'admin', 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pro`
--

CREATE TABLE `tb_pro` (
  `pro_id` int(11) NOT NULL,
  `pro_nam` varchar(255) NOT NULL,
  `prostart` date NOT NULL,
  `proend` date NOT NULL,
  `pro_statname` varchar(255) NOT NULL,
  `pro_workstart` date NOT NULL,
  `pro_workend` date NOT NULL,
  `pro_work_name2` varchar(255) NOT NULL,
  `pro_project_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_project`
--

CREATE TABLE `tb_project` (
  `project_id` int(11) NOT NULL,
  `project_name` varchar(255) NOT NULL,
  `project_person` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_project`
--

INSERT INTO `tb_project` (`project_id`, `project_name`, `project_person`) VALUES
(5, 'Steel', '[\"Lead Project\",\"Senior Project Manager\",\"Project Manager\",\"Project Coordinator\",\"Senior Developer\",\"Bussiness Analyze\",\"System Analyze\",\"Dev-Ops Engineer\",\"Data Engineer\",\"Data Engineer & AI\\/ML\",\"Tester\",\"Lead UX\\/UI Designer\",\"CO-Founder COO\",\"Founder CEO\",\"Founder CFO\",\"Founder CIO\",\"ADMIN\"]'),
(6, 'Ketchup CMS', '[\"Lead Project\",\"Senior Project Manager\",\"Senior Developer\",\"Bussiness Analyze\",\"System Analyze\",\"Dev-Ops Engineer\",\"Data Engineer\",\"Data Engineer & AI\\/ML\",\"Tester\",\"Lead UX\\/UI Designer\",\"CO-Founder COO\",\"Founder CEO\",\"Founder CFO\",\"Founder CIO\",\"ADMIN\"]'),
(7, 'Ketchup  Mobile', '[\"Lead Project\",\"Senior Project Manager\",\"Senior Developer\",\"Bussiness Analyze\",\"System Analyze\",\"Dev-Ops Engineer\",\"Data Engineer\",\"Data Engineer & AI\\/ML\",\"Tester\",\"Lead UX\\/UI Designer\",\"CO-Founder COO\",\"Founder CEO\",\"Founder CFO\",\"Founder CIO\",\"ADMIN\"]'),
(8, 'Asia metal Web', '[\"Lead Project\",\"Senior Project Manager\",\"Assistant Project Manager\",\"Senior Developer\",\"Bussiness Analyze\",\"System Analyze\",\"Dev-Ops Engineer\",\"Data Engineer\",\"Data Engineer & AI\\/ML\",\"Tester\",\"Lead UX\\/UI Designer\",\"CO-Founder COO\",\"Founder CEO\",\"Founder CFO\",\"Founder CIO\",\"ADMIN\"]'),
(9, 'Asia metal Bot', '[\"Lead Project\",\"Senior Project Manager\",\"Assistant Project Manager\",\"Senior Developer\",\"Bussiness Analyze\",\"System Analyze\",\"Dev-Ops Engineer\",\"Data Engineer\",\"Data Engineer & AI\\/ML\",\"Tester\",\"Lead UX\\/UI Designer\",\"CO-Founder COO\",\"Founder CEO\",\"Founder CFO\",\"Founder CIO\",\"ADMIN\"]'),
(10, 'Rakmoa', '[\"Lead Project\",\"Senior Project Manager\",\"Project Manager\",\"Project Coordinator\",\"Senior Developer\",\"Bussiness Analyze\",\"System Analyze\",\"Dev-Ops Engineer\",\"Data Engineer & AI\\/ML\",\"Tester\",\"Lead UX\\/UI Designer\",\"CO-Founder COO\",\"Founder CEO\",\"Founder CFO\",\"ADMIN\"]'),
(12, 'FTI Bot', '[\"Lead Project\",\"Senior Project Manager\",\"Project Manager\",\"Project Coordinator\",\"Senior Developer\",\"Bussiness Analyze\",\"System Analyze\",\"Data Engineer\",\"Dev-Ops Engineer\",\"Data Engineer & AI\\/ML\",\"Tester\",\"Lead UX\\/UI Designer\",\"CO-Founder COO\",\"Founder CEO\",\"Founder CFO\",\"Founder CIO\",\"ADMIN\"]'),
(13, 'FTI Web', '[\"Lead Project\",\"Senior Project Manager\",\"Project Manager\",\"Project Coordinator\",\"Senior Developer\",\"Bussiness Analyze\",\"System Analyze\",\"Dev-Ops Engineer\",\"Data Engineer\",\"Data Engineer & AI\\/ML\",\"Tester\",\"Lead UX\\/UI Designer\",\"CO-Founder COO\",\"Founder CEO\",\"Founder CFO\",\"Founder CIO\",\"ADMIN\"]'),
(14, 'Newpartner', 'Lead Project,Senior Project Manager,Project Manager,Project Coordinator,Senior Developer,Bussiness Analyze,System Analyze,Dev-Ops Engineer,Data Engineer,Data Engineer & AI\\/ML,Tester,Lead UX\\/UI Designer,CO-Founder COO,Founder CEO,Founder CFO,Founder CIO,ADMIN'),
(15, 'Jorakay Ecom', 'Lead Project,Senior Project Manager,Project Manager,Project Coordinator,Senior Developer,Bussiness Analyze,System Analyze,Dev-Ops Engineer,Data Engineer,Data Engineer & AI\\/ML,Tester,Lead UX\\/UI Designer,CO-Founder COO,Founder CEO,Founder CFO,Founder CIO,ADMIN'),
(16, 'Jorakay Admin', 'Lead Project,Senior Project Manager,Project Manager,Project Coordinator,Senior Developer,Bussiness Analyze,System Analyze,Dev-Ops Engineer,Data Engineer,Data Engineer & AI\\/ML,Tester,Lead UX\\/UI Designer,CO-Founder COO,Founder CEO,Founder CFO,Founder CIO,ADMIN'),
(17, 'EQO Qmix', 'Lead Project,Senior Project Manager,Project Manager,Project Coordinator,Senior Developer,Bussiness Analyze,System Analyze,Dev-Ops Engineer,Data Engineer,Data Engineer & AI\\/ML,Tester,Lead UX\\/UI Designer,CO-Founder COO,Founder CEO,Founder CFO,Founder CIO,ADMIN'),
(18, 'SCG Inter', 'Lead Project,Senior Project Manager,Project Manager,Project Coordinator,Senior Developer,Bussiness Analyze,System Analyze,Dev-Ops Engineer,Data Engineer,Data Engineer & AI\\/ML,Tester,Lead UX\\/UI Designer,CO-Founder COO,Founder CEO,Founder CFO,Founder CIO,ADMIN'),
(19, 'Roof', 'Lead Project,Senior Project Manager,Project Manager,Project Coordinator,Senior Developer,Bussiness Analyze,System Analyze,Dev-Ops Engineer,Data Engineer,Data Engineer & AI\\/ML,Tester,Lead UX\\/UI Designer,CO-Founder COO,Founder CEO,Founder CFO,Founder CIO,ADMIN'),
(20, 'Neo', 'Lead Project,Senior Project Manager,Project Manager,Project Coordinator,Senior Developer,Bussiness Analyze,System Analyze,Dev-Ops Engineer,Data Engineer,Data Engineer & AI\\/ML,Tester,Lead UX\\/UI Designer,CO-Founder COO,Founder CEO,Founder CFO,Founder CIO,ADMIN'),
(21, 'Neo Mobile', 'Lead Project,Senior Project Manager,Project Manager,Project Coordinator,Senior Developer,Bussiness Analyze,System Analyze,Dev-Ops Engineer,Data Engineer,Data Engineer & AI\\/ML,Tester,Lead UX\\/UI Designer,CO-Founder COO,Founder CEO,Founder CFO,Founder CIO,ADMIN'),
(22, 'Neo Admin Mobile', 'Lead Project,Senior Project Manager,Project Manager,Project Coordinator,Senior Developer,Bussiness Analyze,System Analyze,Dev-Ops Engineer,Data Engineer,Data Engineer & AI\\/ML,Tester,Lead UX\\/UI Designer,CO-Founder COO,Founder CEO,Founder CFO,Founder CIO,ADMIN'),
(23, 'SCGP', 'Lead Project,Senior Project Manager,Project Manager,Project Coordinator,Senior Developer,Bussiness Analyze,System Analyze,Dev-Ops Engineer,Data Engineer,Data Engineer & AI\\/ML,Tester,Lead UX\\/UI Designer,CO-Founder COO,Founder CEO,Founder CFO,Founder CIO,ADMIN'),
(24, 'Fraser', 'Lead Project,Senior Project Manager,Project Manager,Project Coordinator,Senior Developer,Bussiness Analyze,System Analyze,Dev-Ops Engineer,Data Engineer,Data Engineer & AI\\/ML,Tester,Lead UX\\/UI Designer,CO-Founder COO,Founder CEO,Founder CFO,Founder CIO,ADMIN'),
(25, 'Cotto Ware', 'Lead Project,Senior Project Manager,Project Manager,Project Coordinator,Senior Developer,Bussiness Analyze,System Analyze,Dev-Ops Engineer,Data Engineer,Data Engineer & AI\\/ML,Tester,Lead UX\\/UI Designer,CO-Founder COO,Founder CEO,Founder CFO,Founder CIO,ADMIN'),
(26, 'Ceramic Project sale', 'Lead Project,Senior Project Manager,Project Manager,Project Coordinator,Senior Developer,Bussiness Analyze,System Analyze,Dev-Ops Engineer,Data Engineer,Data Engineer & AI\\/ML,Tester,Lead UX\\/UI Designer,CO-Founder COO,Founder CEO,Founder CFO,Founder CIO,ADMIN'),
(27, 'Ceramic Admin', 'Lead Project,Senior Project Manager,Project Manager,Project Coordinator,Senior Developer,Bussiness Analyze,System Analyze,Dev-Ops Engineer,Data Engineer,Data Engineer & AI\\/ML,Tester,Lead UX\\/UI Designer,CO-Founder COO,Founder CEO,Founder CFO,Founder CIO,ADMIN'),
(28, 'Ceramic Line bot', 'Lead Project,Senior Project Manager,Project Manager,Project Coordinator,Senior Developer,Bussiness Analyze,System Analyze,Dev-Ops Engineer,Data Engineer,Data Engineer & AI\\/ML,Tester,Lead UX\\/UI Designer,CO-Founder COO,Founder CEO,Founder CFO,Founder CIO,ADMIN'),
(29, 'Project Partner', 'Lead Project,Senior Project Manager,Project Manager,Project Coordinator,Senior Developer,Bussiness Analyze,System Analyze,Dev-Ops Engineer,Data Engineer,Data Engineer & AI\\/ML,Tester,Lead UX\\/UI Designer,CO-Founder COO,Founder CEO,Founder CFO,Founder CIO,ADMIN'),
(30, 'Project Partner Mobile', 'Lead Project,Senior Project Manager,Project Manager,Project Coordinator,Senior Developer,Bussiness Analyze,System Analyze,Dev-Ops Engineer,Data Engineer,Data Engineer & AI\\/ML,Tester,Lead UX\\/UI Designer,CO-Founder COO,Founder CEO,Founder CFO,Founder CIO,ADMIN'),
(31, 'EPS', '[\"Project Coordinator\"]'),
(32, 'Line Bot To Do List', '[\"Project Coordinator\"]');

-- --------------------------------------------------------

--
-- Table structure for table `tb_sign`
--

CREATE TABLE `tb_sign` (
  `sign_id` int(11) NOT NULL,
  `sign_name` varchar(255) NOT NULL,
  `sign_start` date NOT NULL,
  `sign_end` date NOT NULL,
  `sign_startname` varchar(255) NOT NULL,
  `sign_workname` date NOT NULL,
  `sign_workend` date NOT NULL,
  `sign_work_name2` varchar(255) NOT NULL,
  `sign_project_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_sit`
--

CREATE TABLE `tb_sit` (
  `sit_id` int(11) NOT NULL,
  `sit_name` varchar(255) NOT NULL,
  `getstart` date NOT NULL,
  `getend` date NOT NULL,
  `sit_getname` varchar(255) NOT NULL,
  `sit_workstart` date NOT NULL,
  `sit_workend` date NOT NULL,
  `sit_work_name2` varchar(255) NOT NULL,
  `sit_project_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_template`
--

CREATE TABLE `tb_template` (
  `template_id` int(11) NOT NULL,
  `template_name` varchar(255) NOT NULL,
  `template_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_template`
--

INSERT INTO `tb_template` (`template_id`, `template_name`, `template_path`) VALUES
(1, 'Business Requirement Document', ''),
(2, 'Acceptance Record', ''),
(3, 'Change Request', ''),
(4, 'Correction Register', ''),
(5, 'Maintenance Documentation', ''),
(6, 'Meeting Record', ''),
(7, 'Product Operation Guide', ''),
(8, 'Progress Status Record', ''),
(9, 'Project Plan', ''),
(10, 'Project Repository', ''),
(11, 'Project Repository Backup', ''),
(12, 'Requirements Specification', ''),
(13, 'Software', ''),
(14, 'Software Component', ''),
(15, 'Software Configuration', ''),
(16, 'Software Design', ''),
(17, 'Software User Documentation', ''),
(18, 'Statement of Work', ''),
(19, 'Test Cases and Test Procedures', ''),
(20, 'Test Report', ''),
(21, 'Traceability Record', ''),
(22, 'Verification Results\r\n', ''),
(23, 'Validation Results', ''),
(24, 'Propasal (If Any)', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_usertest`
--

CREATE TABLE `tb_usertest` (
  `usertest_id` int(11) NOT NULL,
  `usertest_name` varchar(255) NOT NULL,
  `userteststart` date NOT NULL,
  `usertestend` date NOT NULL,
  `usertest_startname` varchar(255) NOT NULL,
  `usertest_workstart` date NOT NULL,
  `usertest_workend` date NOT NULL,
  `usertest_work_name2` varchar(255) NOT NULL,
  `usertest_project_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_dev`
--
ALTER TABLE `tb_dev`
  ADD PRIMARY KEY (`dev_id`);

--
-- Indexes for table `tb_doc`
--
ALTER TABLE `tb_doc`
  ADD PRIMARY KEY (`doc_id`);

--
-- Indexes for table `tb_end`
--
ALTER TABLE `tb_end`
  ADD PRIMARY KEY (`end_id`);

--
-- Indexes for table `tb_get`
--
ALTER TABLE `tb_get`
  ADD PRIMARY KEY (`get_id`);

--
-- Indexes for table `tb_internal`
--
ALTER TABLE `tb_internal`
  ADD PRIMARY KEY (`internal_id`);

--
-- Indexes for table `tb_member`
--
ALTER TABLE `tb_member`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `tb_pro`
--
ALTER TABLE `tb_pro`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `tb_project`
--
ALTER TABLE `tb_project`
  ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `tb_sign`
--
ALTER TABLE `tb_sign`
  ADD PRIMARY KEY (`sign_id`);

--
-- Indexes for table `tb_sit`
--
ALTER TABLE `tb_sit`
  ADD PRIMARY KEY (`sit_id`);

--
-- Indexes for table `tb_template`
--
ALTER TABLE `tb_template`
  ADD PRIMARY KEY (`template_id`);

--
-- Indexes for table `tb_usertest`
--
ALTER TABLE `tb_usertest`
  ADD PRIMARY KEY (`usertest_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_dev`
--
ALTER TABLE `tb_dev`
  MODIFY `dev_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_doc`
--
ALTER TABLE `tb_doc`
  MODIFY `doc_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_end`
--
ALTER TABLE `tb_end`
  MODIFY `end_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_get`
--
ALTER TABLE `tb_get`
  MODIFY `get_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tb_internal`
--
ALTER TABLE `tb_internal`
  MODIFY `internal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_member`
--
ALTER TABLE `tb_member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tb_pro`
--
ALTER TABLE `tb_pro`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tb_project`
--
ALTER TABLE `tb_project`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tb_sign`
--
ALTER TABLE `tb_sign`
  MODIFY `sign_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tb_sit`
--
ALTER TABLE `tb_sit`
  MODIFY `sit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_template`
--
ALTER TABLE `tb_template`
  MODIFY `template_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tb_usertest`
--
ALTER TABLE `tb_usertest`
  MODIFY `usertest_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
