-- MySQL dump 10.13  Distrib 8.0.33, for Linux (x86_64)
--
-- Host: localhost    Database: brief_news
-- ------------------------------------------------------
-- Server version	8.0.33-0ubuntu0.22.04.2

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `articles`
--

DROP TABLE IF EXISTS `articles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `articles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `header` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `policy` tinyint(1) NOT NULL,
  `economy` tinyint(1) NOT NULL,
  `science` tinyint(1) NOT NULL,
  `technologies` tinyint(1) NOT NULL,
  `sport` tinyint(1) NOT NULL,
  `other` tinyint(1) NOT NULL,
  `world` tinyint(1) NOT NULL,
  `local` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `articles_user_id_foreign` (`user_id`),
  CONSTRAINT `articles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `articles`
--

LOCK TABLES `articles` WRITE;
/*!40000 ALTER TABLE `articles` DISABLE KEYS */;
INSERT INTO `articles` VALUES (1,2,'This is test header, writerName_1, article N 1','This is the test body of the article,\n                     then the random text is displayed: <br>C6ArXyg6V0cCufaVZhm4grWoCw562R6dc9ymUjEIfDbnw2tzDKKozgcdMe6hoCFzmv3o7NyOyFEJpxRLrYXdJ2bLTS5CKK0EqjJWx4SKHALa0B3P4YNrcAXqvncZyYZoVMP9HHMh0MESRzS20XM6Qidrn7QTNaLw6W7QYi3fURWe4bQB7eopN5vEiIvCbKrxqqFvjeIrHABEaiTbhPQ9rBO85x6Scal2T918JxN2vHILI3OMnYn7K2HsMVFeZbPxe9cp4p0hyYapg3reQZVVrgF6JS2WoUGq3YuEwm9FX2JZl9YwZFnJYFMAmDBxMPbLdSzcYZru0C2XmhsusQSmR8Y42BcLgNFAa55JVs1lUWsa1O4uz1uBah0RrQOwIY9kZGaG6o1EkaG4D8FwwrOLL2NpcIeWumGFeqbFWpXwdcv80VxigEPmLmfzl6gfs0eBW3eMfHAhXpUmFHktR0IxIEDk7GSY0dVoHKnWFe91rCvSjpkRzC7g',0,0,0,0,0,1,0,1,'2023-06-09 13:12:16','2023-06-09 13:12:16',NULL),(2,2,'This is test header, writerName_1, article N 2','This is the test body of the article,\n                     then the random text is displayed: <br>wYpIJQ1QnVfWU7vMnvpKwzM8YOGNR8IJ0urPONa6Q9nDlY5Sn1JFUE3ROC8IHUG8zV19FwiFv3k9v5C6vDRWjWaMASZr6tOdZwHKB0V9EDbLZULlBaxQFsjs2figZBeAWcHqaPawEqCKEFZKmCUXyQ9lZJCtCSZotyAovuJkR3ZQWACWYHjl4XQoHtsAODc2LUZiEHWigIdPotEAHG4HD1oVpTlcehrfR5fnyZBBhMZfKJQvPXHYpKDKeccdn2mwZc4pIF4IeGhpdhNymiS22yTaqGDw4ZSuh2FgKF1XrExUbvf4RXKVK4A6pk6LUkraZ2ShO2kQsivBIG4NxBO0FnBkfVtPXFdm86OWMZbRWVYhIUq6eD9YTZtFNFKTYiFB2U3qjrcoFlGSAtzXCKMeINVPRLL2UpdRsw1mT1TWY2eK1eYjVwuRWdu3e4aEgAXIzlZJyY7UloLy6ZsuqaOdpoX8qSME9u8bfjntmuhRScKkuC1fp1Le',0,1,0,0,0,0,1,0,'2023-06-09 13:12:16','2023-06-09 13:12:16',NULL),(3,2,'This is test header, writerName_1, article N 3','This is the test body of the article,\n                     then the random text is displayed: <br>eCqLziue5aGTKai88GuGe4LTz1QENT9ahTWzEHADVeKsOfE5Uc0LS49cTSYfTxrdfhOImCwdXxxI7s2kOejXyKcNLyakdWcHHwWWvVps1yfeBdZng3yfhu6Et3wCCtj8RfCDXey3CXDmT5UBOUj5WNn4f1E6rMJB0RJOHFioLtoruSLtLsDPKtgjW9LidJZQBIhAwK0bFf8RYn3zADtxxN1rsOZyme3aG3sbgbgaxlt6EpNjzyUrrmh9XaBsCurOAKUqcrGv4SKwTBOpCWqWH9JkO6SEUTGu2NBKcJBwJgYubRmkyehAEsoqSUuF3xQOiNHKOLOAHbeK0PVi3xYeiZNdq94RZ2pmjOdfNNGzrLjDkG6LPTGIyvcDV0OgjSaeMYpDZoAuIirvwT5RG2EEW4Ode3X2vfbVPaogxketbCirLvl0mP82RrVV0Mo8bcb0PqHZahC8efCBmSAweUXjnjh7lTd1cfD1nExtocU6ULcD7PIRRo9M',0,0,1,0,0,0,0,1,'2023-06-09 13:12:16','2023-06-09 13:12:16',NULL),(4,2,'This is test header, writerName_1, article N 4','This is the test body of the article,\n                     then the random text is displayed: <br>YtPd95V9x832oB6Z96Q6L72dfu0Kcy877jcFwlDlm32anqHPY3iRuT16Yrn0moh9mZy9GJiq7u23nYtSdy0MSZzINd6lOz9sg3JgeOctiqdppOGNX6JHavRVVEvGc0orEqqcbP87j08NGYTgAxY5uPnM6LYDCcRvaxi3e3GPiFOCtOAWrhk9zzbJS8Tl6ai6sUKqwXYjKTr5D6vBrntrt5Eaf8stLSeAQ7BzQleba6aIn5CJCw37TpZUDz1EaHks7fKbS5jn9hj2GHU9DohIsY2XCycf7ygh78RKWIVvU7m0LOck0mXZyIkRAWezP3go2WZhv7mWxcgoOEJrb3I7Dro9fNHXn9aMKkzt9jLATky73GXyrgs7cGFncPSGVQJbgyY2iuLqPZrFmJMQjL4TKkamOcWxMTcNtZ7hb5b61qoFYysEjmPMYfzb234GvRb32EDh4c3pc9aiPQ39beCjiUnVOaTBFKlPhOORrNzFevlwccxuk4yO',0,0,1,0,0,0,0,1,'2023-06-09 13:12:16','2023-06-09 13:12:16',NULL),(5,2,'This is test header, writerName_1, article N 5','This is the test body of the article,\n                     then the random text is displayed: <br>PYrI6MgoonDPRKtslcBn4WxXqUnjsDrdlg1sOEv5b8dt3bv0diQqzJNnZzyw8AWhGjVKrqkr95scppAKszuCQCg8L7MhElIohkV1UP3pLTcX5HVBUpJ6jlyNDZ5BMJICyz2HC5iwa7fnTR5JUxljYRTJ8ZQPHX2IN7dU527ghYh9MzbbOK6UGcowpcSzG9Av2KGhr6BPfwoIqWNEgdTuPRum9opaaMF6qFq46YAehGBSP39lsbrkQHotjph3wrG6MqLhQwNcFuicWJZhy1YFKxgoH8WjApOg4ZYh3jjKY5xGYfgphmBfAyXYdy4PxcgNcPq7wnQXnFLqnQnWlRgmMGnVoPehfVOHkefaTeLMmuMFbRgt2DYVsJEMfMyxTzegfBC6Ed0WN5cMRhDaBZPXukkkaSYdlIwohulCsmXi2l0ehaZsynDfxuwasa6Dx19qa1tKCzyPtFJQ4vwD71H48kfSeanZDG0hMB5SSejajSnvgRWK2pM9',0,1,0,0,0,0,1,0,'2023-06-09 13:12:16','2023-06-09 13:12:16',NULL),(6,3,'This is test header, writerName_2, article N 1','This is the test body of the article,\n                     then the random text is displayed: <br>9I2eajY2LfPec0TdBeV5LobGn0C2xo3LYXkqcnqZ8YtiCRGNYiUepV1U5nnnqlwc8O9UF7A2fVkFTVBgtj8FWRpJi7AJTGnr6kyF5WkwoPtAIaqgeYwQauvv0i6Jt64C5dCYHN8MrpzYCJq1Ahhvo3jQDHFMY9gG3CrVWLxYICvmC9jHQ1L4HQXtmlWB3ExpKLlTlPxtvrk7O0YRK3bC5my3kVrXVSrJNindzpkcfLRrfXY9dsRM7blNpc8TGmJm3fjTod0SEcBoaZSwUxAYOuGXJlkGNv51EURZOcene52OkVmp9Ifa6ouM2DfJvT8CUam1bSlPC7y235DfXSCYFWOEHVJpPUKAaT2NIIvnw7exn4KROpnUMNpvRxhiSYAkobTmvyWFiRjYCm1wdZj2W6zRnOa5CrrOfxLZ5mEtesDVnr0mNIywa2JVFQf7tNQwpSyP5r1TL3SmnkZYXsiQuZa6z3tMaeVCkbWEzFqdfGkb9oq2s1Cg',0,1,0,0,0,0,1,0,'2023-06-09 13:12:16','2023-06-09 13:12:16',NULL),(7,3,'This is test header, writerName_2, article N 2','This is the test body of the article,\n                     then the random text is displayed: <br>JnYGnZ9uCB6fMOLqUNItdJzNWcsSzOpdPWNapACfsVCar215SnUBR6RiBsqFJs3vSrTlUpGuJUitCbC7ZMHf92TkigdgOt9r1KFNNx7xjHiaQkgdLlBfJcx0n0gxhiCeG1r1dLBsPKKypGpaGELTbP1gz2VLsFmOPGGkcqQraOjoveZYMz93m3RKXbixjz7NB7YKaFiFA5RXhQHKXuPJQlKTXARXsCbe71NKFC1FITI9m7xnvKLWXMMyswiO8p3Wb5FTlXwTkjL2fm60sgjubeaOm3lesNSs4uAAtzfPYHKegPLZP6XnThO3MZxOSNP2bRfEYA3dyWCraT7jagHhhmQyfzu3YeyqP1bmsemaHp2TpNRUvTNeFzUfyXWq2xzQLBnuF4FTbUDxNJY1VBn73EPSE2GmulBlyMA9lwGxpjOjWveC2E0RSAHmiFgylIBRKj0B2yGQ6CjIMSj32Ihg1YPXGOVfOPDKxFs3jmAe9DhqZR4YBfnO',0,0,0,1,0,0,1,0,'2023-06-09 13:12:16','2023-06-09 13:12:16',NULL),(8,3,'This is test header, writerName_2, article N 3','This is the test body of the article,\n                     then the random text is displayed: <br>dCyl6zSosR2eHSHZjI3f4DZoHTic1Ex2U2aMwlXu44FNDiaSotUpZgDcvDYjC9m79Yb2rmhzbTNKN6b5xhOgRrHRUYlN3ecsA1dZzKsKxM6Xkexdh9GkVT4YCeGl3e1H87ocXI2sBgdJWa4sPKAA0Gp6UpixRxMUvCjzriENq2c5duRlsMlmgVJuSmlkJ6BPKPcrIAI4fqExN3Y6s6Tz9OnVh95Hxt8J6f4d362I4LBxjrXLuQRY51kieKoCXKI94doEhKz27Ov9iZfGgsNf3aHdCwgevgRXL7TRbTe7phLaCyixANhzT6J6fDWp3FDZxe6NS5zR5gViQM4oEHwZ5SVt9g7c8YiUFKnPigTP6i7aaaTUzT9XvVvWhMTE44j2OwbOW443pAjto1lmSpNOvNVBIXlmOZOoQ3tA8XolwVUmvG6KzcTuAfHWlQ1GwwEVgXkpNz1IsDdOCgul5sa5YOattOZwrRIGdBfT805whbJC8piis2AA',0,0,0,0,0,1,1,0,'2023-06-09 13:12:16','2023-06-09 13:12:16',NULL),(9,3,'This is test header, writerName_2, article N 4','This is the test body of the article,\n                     then the random text is displayed: <br>jDOGNMeJBSE7hPLROWhxEEhM1zXUfOnjAWtpwfhyhIHevoAkwOFbTyvR2eFwPIziDkMUqaYzg2p15r8Aysu73m0TfaqvPb22lyVYuVJuhgrO3A6DGpyxkjp66bzkEWl9i1op1ekGpOPxiS1aM9oN11Z2c42JhmSd9UgHgE12yP5aAHBUtIQ2XYU8j9fNKTvcbPfCxs3o3voVCPXSwTCbyavzbF9YLATJAQigV32r8td9G88kS6lPvRIePCJWsJB90SQotu9SlXvuPXaHfWC5rGFPZjdZJQMI8WT2hEDaZNaiYF8VP1uL4QjjUdc3PV1crupskvvpyugXa1keMukBZuRDysO5EmueR4htnMBhWZeOENeyZGkwwpyXAMFRljltFjRJVFpIvbZoL5wDRQJYU4Ege52RySdGq0r5tg981j2PPkiXbRQyX3gRO9VqR9pj5TQeq21MfN7gUIch0vsQ4qoIHTCjDJCt7U9L3tdOl9xHNTfZlfkm',0,0,0,0,1,0,1,0,'2023-06-09 13:12:16','2023-06-09 13:12:16',NULL),(10,3,'This is test header, writerName_2, article N 5','This is the test body of the article,\n                     then the random text is displayed: <br>BwyHVIj5Pn09aBROdu2z6y9qjFgptmcpZxJUoDAJDyDdIA63F6f4Wbbna2q8Y6aQmJVbYXLEvPEGQymp3WLRNuGscb5aVoW3C0CAmRLFfDfph2n8XKkRODVTh5HABnI2ATmlxuEtE6oP4Rf2Gs01NWh079oCMDvZMNjfPtbECfQBTPhxtYYs4tI9k2Ab8sKDqIsubeWfk5jvUbAAM8oIXjdrMAHVssu2lU8GtesXmjir5tLLmmWb8YgS0T72T8lM7yFj3MhgpscQL5IXgrXktTYOHv62G09LK6IsrkqmXoZ4jLH7AsK7LQrIcy21w45jpWSVSAfcZFAteIbxxr2LLR6gvmFkUe9osqwMGRxqZ1ryvKhbk77QKv8EPviyCv9Q0iOFsywWpNLRUK05wdG8vQ2i2QiY607Bf31sxIzHDJzTHibthhPvD0HstTh3qyWcFCDmKPtXSIEwps4W4LuGX2m2gpueaP0WBYHg1mSdZx1X8HgkLTUx',0,0,1,0,0,0,1,0,'2023-06-09 13:12:16','2023-06-09 13:12:16',NULL),(11,4,'This is test header, writerName_3, article N 1','This is the test body of the article,\n                     then the random text is displayed: <br>7y80rhlnmbhn9Pk1yvGeasf6KwSLvATWsg0pvflm849HTkiUkQJba0e9MD3cbcS1iT05Afx62PQfqiPjdDOyqw7eikZPTAMhBoqoDe5x9LuIgYS3wrlpitbyNFkX350U3lj5wqeFZVJGQmkbfPcDzc8jifkBO13s32qoJBSb9zhraxGvi4BgAkZ0Ibp1TsQJSemnUwl1OTCfWxJk1NmGExgqnspoyq1eemAVbTvStdCbiLu6LnjI6LTJwzlKNZsTeBh3RsivFQqru62e63B0TvkcX3GCbUhih3mRRdxu1kHkUH093qIb5NqouRnaQiQaFZp8CS3kE4zEmd3FkjQ1GVxipVnl1z6v5iOr8NNctxVcwqGNSegGGk90FUW7TmWX4lwBTm72qsxYtcBpSJvyBln1b3KIvcNY6J5evJ0CECM6NlE2E1V5g1tbtiXBrM1ibO59hKE2G46aKd0TI25An5X3pyvDgXd9Mh3Cg4AGwSObtuJ79REu',0,0,0,0,1,0,1,0,'2023-06-09 13:12:16','2023-06-09 13:12:16',NULL),(12,4,'This is test header, writerName_3, article N 2','This is the test body of the article,\n                     then the random text is displayed: <br>rm7TF54gx4Bhuu9B6Wq8KMA4qUehLcRmyADkO7RWNtlIFNTSUJ5Vd5eNHhJBtpWGxwkEhe3vKTB07ZkqeWiXvr69wwIZlPaD5yqrWdlmn0Gv993FVSaossAtiWYRO51ylrVdRecUUdWrW3qBohASFHxLDXCfh1pgBYEufEwZblIPKLPr9ssvqmx9j5NHgOcjUb36yrYC8K5h7dKZH6At9enYLL39MtFP2RonOOlYdhoUPKqSkQZUVdIyKEU36cboi0pPHyh12yjo63Ayn1W7lsC8PxUDErguSbUEgCIawWZtUMhAmRzykF2tQlY27ciVETCUO61JZLmQkOn0xNM7jhAKjm2ufhJkYtPxYteHtw1X0VoZrvnF913qF9YmncyQODBhwliWNuoAMwwuP9izNVvTvbrZML0dGFWqrH2T8gnTR31nnBVGEXbTCyc2D5pAbOGHflkDqwtGOESFpL1w4nllWxQ0lWSjsRNagcK0qHvPAkHdkTdm',0,1,0,0,0,0,0,1,'2023-06-09 13:12:16','2023-06-09 13:12:16',NULL),(13,4,'This is test header, writerName_3, article N 3','This is the test body of the article,\n                     then the random text is displayed: <br>ZHYjVLT4k5tz77G8I8SaL8UUkT6gY5O8crYc1hUkxVdCyjDbadyxGZPMGA0DXR0nbkavDy5zob89Do7CVMvkXZgA7mFWPeopW2rJJwXyHd1H7C9xR7ORalkJw0c2V3PiaoXZFBcDTYt9ouIunAGFpOo7X00nsIbvIaSZXcAFbKwkVlgaUTzPqXK11ciKS0oheZnsGlkf4JogTFgI6WVp6oBEiqgs37kRUuw6yydIqCZ3umWje5eOt7zrDgEmC2Gs14tq7Pj4l1PPejZquvWhWg0Vz7PqFQ62jZCZQ78VVvve2RWKbv0uYOh29lc1W7ccjH7ixSWt4ru1B79I5JbG9dpiGTUA789cfrAR40TrQuuhLCQuQAUzBR5kvJ5ImoVQEeMmsnSW0Xd2C5CTjBocoE7NxEIK8U6p8b2Y9ds7T5sRBITRcqj0RDRFeIqeb5LYOm7zL5QwebQeCrSkKlq3UPlWeU6TQa8WYUaaQnovPKmmVVkRxEJq',0,0,0,0,0,1,1,0,'2023-06-09 13:12:16','2023-06-09 13:12:16',NULL),(14,4,'This is test header, writerName_3, article N 4','This is the test body of the article,\n                     then the random text is displayed: <br>y1bCIzvKO03qAcLpKvKKtXV7Fd0klYljUt6yOWKDmuR4LybCOSshdEKfKq00FDIo3IXyMzgbrsoCQz94c4pBUT4oEak3TuLNKJ2fbanrGOW4MPAhyjcj2IX0oZZIN3GzoczOaet8trpgURoyxUQVrU5a4Rdz0mvNxq4ZLQCCZx3W7tEprWLDHw21LS9d2bvjanXFnpEnXe13lay0o8ds6014OmHtrrRjtuLAhBuDWYRaqwa8Y5SFCoy5hb10BVllHgYpvgR7gZn9HyWD8jzytXuxi35FevysMgDcvtPbjLohadisZ3WG06YRBeR2EjAyOpw9xoBWQV4ipVW78vHlglRBtfAbrwLC1jTcSukbIzyECNLOYGEbwNErDF46ocLAxz96NHC8NM6IMlU02rCmNcvDN2zuhhS40RdY0zVO78mEIa7Pxw4CslbdRzLkk1Ed5ShXxmAyU5jcszRlgGejVT1ZCIBC8YRI0bvYeyNxn6btNN0ymyVe',0,0,0,1,0,0,1,0,'2023-06-09 13:12:16','2023-06-09 13:12:16',NULL),(15,4,'This is test header, writerName_3, article N 5','This is the test body of the article,\n                     then the random text is displayed: <br>ThBapmPxzox9JE5FntgMxWip5b9XCTlaEQLVGxB7zdTGGOz4EhjcHx2RIcpbNO8Wu9sgqFHKZdrvJnCKUJ5zdNRbsY5fWNEq37QVxjvURx3EWiuGUGPbUJWBDeLcewIAvVDvYhwOQ1cFFwIdmTc3YC2yDgIWPpmLfgT6aRNsNzW2PxiXckSc5YkYBhAnJUpaAgbIRqp7lAZumojcvhYdx5XPi8CUAMqQstelvbD8iMUxloB7wnv88i0M2PWYqY7UJd50XexPJmYFbncwdkkOudphcijKqUKubrCLYNF3fsJyNwX3ETSbWtjFTF8prNlwvw82g5d8CyR9Z9tv0TG8JX0VCJOEzzceWby0kSSNDE1VRF2CP9kNSnoEjGD4wH1Sv02aDFOSbwqlRdaMi9QOqTQW8icM44BU5Dzu6ejs9rIcSK2ZuCre7X5nbJowQMvUhEuGDsqEqqfDnI4cqe7EmJkdFqFdkKqIZ1b5Cfiop2w2pXGUskeE',0,0,0,0,0,1,1,0,'2023-06-09 13:12:16','2023-06-09 13:12:16',NULL);
/*!40000 ALTER TABLE `articles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (16,'2014_10_12_000000_create_users_table',1),(17,'2014_10_12_100000_create_password_reset_tokens_table',1),(18,'2014_10_12_100000_create_password_resets_table',1),(19,'2019_08_19_000000_create_failed_jobs_table',1),(20,'2019_12_14_000001_create_personal_access_tokens_table',1),(21,'2023_06_06_085552_create_articles_table',1),(22,'2023_06_06_085655_create_sources_links_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sources_links`
--

DROP TABLE IF EXISTS `sources_links`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sources_links` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `article_id` bigint unsigned NOT NULL,
  `link` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sources_links_article_id_foreign` (`article_id`),
  CONSTRAINT `sources_links_article_id_foreign` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sources_links`
--

LOCK TABLES `sources_links` WRITE;
/*!40000 ALTER TABLE `sources_links` DISABLE KEYS */;
INSERT INTO `sources_links` VALUES (1,1,'This_is_link_N_1.com.ua','2023-06-09 13:12:16','2023-06-09 13:12:16',NULL),(2,1,'This_is_link_N_2.com.ua','2023-06-09 13:12:16','2023-06-09 13:12:16',NULL),(3,1,'This_is_link_N_3.com.ua','2023-06-09 13:12:16','2023-06-09 13:12:16',NULL),(4,1,'This_is_link_N_4.com.ua','2023-06-09 13:12:16','2023-06-09 13:12:16',NULL),(5,1,'This_is_link_N_5.com.ua','2023-06-09 13:12:16','2023-06-09 13:12:16',NULL),(6,2,'This_is_link_N_1.com.ua','2023-06-09 13:12:16','2023-06-09 13:12:16',NULL),(7,2,'This_is_link_N_2.com.ua','2023-06-09 13:12:16','2023-06-09 13:12:16',NULL),(8,2,'This_is_link_N_3.com.ua','2023-06-09 13:12:16','2023-06-09 13:12:16',NULL),(9,2,'This_is_link_N_4.com.ua','2023-06-09 13:12:16','2023-06-09 13:12:16',NULL),(10,2,'This_is_link_N_5.com.ua','2023-06-09 13:12:16','2023-06-09 13:12:16',NULL),(11,3,'This_is_link_N_1.com.ua','2023-06-09 13:12:16','2023-06-09 13:12:16',NULL),(12,3,'This_is_link_N_2.com.ua','2023-06-09 13:12:16','2023-06-09 13:12:16',NULL),(13,3,'This_is_link_N_3.com.ua','2023-06-09 13:12:16','2023-06-09 13:12:16',NULL),(14,3,'This_is_link_N_4.com.ua','2023-06-09 13:12:16','2023-06-09 13:12:16',NULL),(15,3,'This_is_link_N_5.com.ua','2023-06-09 13:12:16','2023-06-09 13:12:16',NULL),(16,4,'This_is_link_N_1.com.ua','2023-06-09 13:12:16','2023-06-09 13:12:16',NULL),(17,4,'This_is_link_N_2.com.ua','2023-06-09 13:12:16','2023-06-09 13:12:16',NULL),(18,4,'This_is_link_N_3.com.ua','2023-06-09 13:12:16','2023-06-09 13:12:16',NULL),(19,4,'This_is_link_N_4.com.ua','2023-06-09 13:12:16','2023-06-09 13:12:16',NULL),(20,4,'This_is_link_N_5.com.ua','2023-06-09 13:12:16','2023-06-09 13:12:16',NULL),(21,5,'This_is_link_N_1.com.ua','2023-06-09 13:12:16','2023-06-09 13:12:16',NULL),(22,5,'This_is_link_N_2.com.ua','2023-06-09 13:12:16','2023-06-09 13:12:16',NULL),(23,5,'This_is_link_N_3.com.ua','2023-06-09 13:12:16','2023-06-09 13:12:16',NULL),(24,5,'This_is_link_N_4.com.ua','2023-06-09 13:12:16','2023-06-09 13:12:16',NULL),(25,5,'This_is_link_N_5.com.ua','2023-06-09 13:12:16','2023-06-09 13:12:16',NULL),(26,6,'This_is_link_N_1.com.ua','2023-06-09 13:12:16','2023-06-09 13:12:16',NULL),(27,6,'This_is_link_N_2.com.ua','2023-06-09 13:12:16','2023-06-09 13:12:16',NULL),(28,6,'This_is_link_N_3.com.ua','2023-06-09 13:12:16','2023-06-09 13:12:16',NULL),(29,6,'This_is_link_N_4.com.ua','2023-06-09 13:12:16','2023-06-09 13:12:16',NULL),(30,6,'This_is_link_N_5.com.ua','2023-06-09 13:12:16','2023-06-09 13:12:16',NULL),(31,7,'This_is_link_N_1.com.ua','2023-06-09 13:12:16','2023-06-09 13:12:16',NULL),(32,7,'This_is_link_N_2.com.ua','2023-06-09 13:12:16','2023-06-09 13:12:16',NULL),(33,7,'This_is_link_N_3.com.ua','2023-06-09 13:12:16','2023-06-09 13:12:16',NULL),(34,7,'This_is_link_N_4.com.ua','2023-06-09 13:12:16','2023-06-09 13:12:16',NULL),(35,7,'This_is_link_N_5.com.ua','2023-06-09 13:12:16','2023-06-09 13:12:16',NULL),(36,8,'This_is_link_N_1.com.ua','2023-06-09 13:12:16','2023-06-09 13:12:16',NULL),(37,8,'This_is_link_N_2.com.ua','2023-06-09 13:12:16','2023-06-09 13:12:16',NULL),(38,8,'This_is_link_N_3.com.ua','2023-06-09 13:12:16','2023-06-09 13:12:16',NULL),(39,8,'This_is_link_N_4.com.ua','2023-06-09 13:12:16','2023-06-09 13:12:16',NULL),(40,8,'This_is_link_N_5.com.ua','2023-06-09 13:12:16','2023-06-09 13:12:16',NULL),(41,9,'This_is_link_N_1.com.ua','2023-06-09 13:12:16','2023-06-09 13:12:16',NULL),(42,9,'This_is_link_N_2.com.ua','2023-06-09 13:12:16','2023-06-09 13:12:16',NULL),(43,9,'This_is_link_N_3.com.ua','2023-06-09 13:12:16','2023-06-09 13:12:16',NULL),(44,9,'This_is_link_N_4.com.ua','2023-06-09 13:12:16','2023-06-09 13:12:16',NULL),(45,9,'This_is_link_N_5.com.ua','2023-06-09 13:12:16','2023-06-09 13:12:16',NULL),(46,10,'This_is_link_N_1.com.ua','2023-06-09 13:12:16','2023-06-09 13:12:16',NULL),(47,10,'This_is_link_N_2.com.ua','2023-06-09 13:12:16','2023-06-09 13:12:16',NULL),(48,10,'This_is_link_N_3.com.ua','2023-06-09 13:12:16','2023-06-09 13:12:16',NULL),(49,10,'This_is_link_N_4.com.ua','2023-06-09 13:12:16','2023-06-09 13:12:16',NULL),(50,10,'This_is_link_N_5.com.ua','2023-06-09 13:12:16','2023-06-09 13:12:16',NULL),(51,11,'This_is_link_N_1.com.ua','2023-06-09 13:12:16','2023-06-09 13:12:16',NULL),(52,11,'This_is_link_N_2.com.ua','2023-06-09 13:12:16','2023-06-09 13:12:16',NULL),(53,11,'This_is_link_N_3.com.ua','2023-06-09 13:12:16','2023-06-09 13:12:16',NULL),(54,11,'This_is_link_N_4.com.ua','2023-06-09 13:12:16','2023-06-09 13:12:16',NULL),(55,11,'This_is_link_N_5.com.ua','2023-06-09 13:12:16','2023-06-09 13:12:16',NULL),(56,12,'This_is_link_N_1.com.ua','2023-06-09 13:12:16','2023-06-09 13:12:16',NULL),(57,12,'This_is_link_N_2.com.ua','2023-06-09 13:12:16','2023-06-09 13:12:16',NULL),(58,12,'This_is_link_N_3.com.ua','2023-06-09 13:12:16','2023-06-09 13:12:16',NULL),(59,12,'This_is_link_N_4.com.ua','2023-06-09 13:12:16','2023-06-09 13:12:16',NULL),(60,12,'This_is_link_N_5.com.ua','2023-06-09 13:12:16','2023-06-09 13:12:16',NULL),(61,13,'This_is_link_N_1.com.ua','2023-06-09 13:12:16','2023-06-09 13:12:16',NULL),(62,13,'This_is_link_N_2.com.ua','2023-06-09 13:12:16','2023-06-09 13:12:16',NULL),(63,13,'This_is_link_N_3.com.ua','2023-06-09 13:12:16','2023-06-09 13:12:16',NULL),(64,13,'This_is_link_N_4.com.ua','2023-06-09 13:12:16','2023-06-09 13:12:16',NULL),(65,13,'This_is_link_N_5.com.ua','2023-06-09 13:12:16','2023-06-09 13:12:16',NULL),(66,14,'This_is_link_N_1.com.ua','2023-06-09 13:12:16','2023-06-09 13:12:16',NULL),(67,14,'This_is_link_N_2.com.ua','2023-06-09 13:12:16','2023-06-09 13:12:16',NULL),(68,14,'This_is_link_N_3.com.ua','2023-06-09 13:12:16','2023-06-09 13:12:16',NULL),(69,14,'This_is_link_N_4.com.ua','2023-06-09 13:12:16','2023-06-09 13:12:16',NULL),(70,14,'This_is_link_N_5.com.ua','2023-06-09 13:12:16','2023-06-09 13:12:16',NULL),(71,15,'This_is_link_N_1.com.ua','2023-06-09 13:12:16','2023-06-09 13:12:16',NULL),(72,15,'This_is_link_N_2.com.ua','2023-06-09 13:12:16','2023-06-09 13:12:16',NULL),(73,15,'This_is_link_N_3.com.ua','2023-06-09 13:12:16','2023-06-09 13:12:16',NULL),(74,15,'This_is_link_N_4.com.ua','2023-06-09 13:12:16','2023-06-09 13:12:16',NULL),(75,15,'This_is_link_N_5.com.ua','2023-06-09 13:12:16','2023-06-09 13:12:16',NULL);
/*!40000 ALTER TABLE `sources_links` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `surname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nickname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'incognito',
  `role` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'reader',
  `status` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,NULL,NULL,'incognito','root','active','root@gmail.com',NULL,'$2y$10$8UdL9xPbZNQvGsq6X1kC5ekOZyzeA./AI4LVMnPxiQIiYqSPwMbeq',NULL,'2023-06-09 07:57:58','2023-06-09 07:57:58',NULL),(2,'writerName_1','writerSurname_1','writerNickname_1','writer','active','writerEmail_1@gmail.com',NULL,'$2y$10$76.0cuc6ADdpCEKNnUCSS.etq6LejFVTXKvJQpHn.dSzxNy8JQFRq',NULL,'2023-06-09 13:12:16','2023-06-09 13:12:16',NULL),(3,'writerName_2','writerSurname_2','writerNickname_2','writer','active','writerEmail_2@gmail.com',NULL,'$2y$10$uQgP/zThYjW7BcGgBi4eoul9rt.aMZijEm7eklyZbK3NVwiQ7IP2G',NULL,'2023-06-09 13:12:16','2023-06-09 13:12:16',NULL),(4,'writerName_3','writerSurname_3','writerNickname_3','writer','active','writerEmail_3@gmail.com',NULL,'$2y$10$ALxUua4WgJO61ft07F/OtOLvyREkja0LKu.LfzlXK6pEx2v1ORZqO',NULL,'2023-06-09 13:12:16','2023-06-09 13:12:16',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-06-09 16:21:43
