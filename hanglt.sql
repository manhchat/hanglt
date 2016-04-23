-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2016 at 07:11 AM
-- Server version: 5.6.26
-- PHP Version: 5.5.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hanglt`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(10) unsigned NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `item_order` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `update_timestamp` int(11) DEFAULT NULL,
  `create_timestamp` int(11) DEFAULT NULL,
  `status` smallint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`, `item_order`, `image`, `update_timestamp`, `create_timestamp`, `status`) VALUES
(11, 'おしぼり／白', 1, 'oshibori_bright_green_w80_01_570bb8abd1541.jpg', 1461382445, 1460385963, 1),
(12, 'おしぼり／カラー', 2, 'oshibori_brown_w80_01_570bb8c4a30b4.jpg', 1460385988, 1460385988, 1),
(13, 'おしぼりトレイ', 3, 'oshibori_white_w70_01_570bb8e030702.jpg', 1460386016, 1460386016, 1),
(14, 'おしぼり用温冷庫', 4, 'oshibori_white_w70_01_570bb926c7d0a.jpg', 1460386087, 1460386087, 1),
(15, '紙おしぼり', 5, 'oshibori_yellow01_w70_01_570bb9404ce14.jpg', 1460386112, 1460386112, 1),
(16, 'フェイスタオル', 6, 'oshibori_brown_w80_01_570bb94eb9f7e.jpg', 1460386126, 1460386126, 1),
(17, 'バスタオル', 7, 'oshibori_yellow01_w70_01_570bb96d3b70e.jpg', 1460386157, 1460386157, 1),
(18, '訳あり在庫処分品', 8, 'oshibori_brown_w80_01_570bb97761ab3.jpg', 1460386167, 1460386167, 1);

-- --------------------------------------------------------

--
-- Table structure for table `image_tmp`
--

CREATE TABLE IF NOT EXISTS `image_tmp` (
  `id` int(11) NOT NULL,
  `path` varchar(255) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `image_tmp`
--

INSERT INTO `image_tmp` (`id`, `path`, `created`) VALUES
(5, '571656d6cc9110837905001461081814\\571656d6cc911.jpg', '2016-04-19 18:03:34'),
(6, '571656d70f5c60062918001461081815\\571656d70f9ae.jpg', '2016-04-19 18:03:35'),
(7, '571656d75762f0357935001461081815\\571656d75762f.jpg', '2016-04-19 18:03:35');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `body` text,
  `summary` text,
  `update_timestamp` int(11) NOT NULL,
  `create_timestamp` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `image`, `body`, `summary`, `update_timestamp`, `create_timestamp`) VALUES
(11, '熊本・南阿蘇村 不明２人の捜索続く', 'oshibori_yellow01_w70_01_571aec3fd9597.jpg', '<p><span style="font-family:ヒラギノ角ゴ pron w3,hiragino kaku gothic pron,メイリオ,meiryo,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:16.002px">南阿蘇村河陽の高野台地区では、今回の地震で大規模な土砂崩れが起き、この地区にいたとみられる早川海南男さんの行方が、依然分からないままとなっています。</span><br />\r\n<span style="font-family:ヒラギノ角ゴ pron w3,hiragino kaku gothic pron,メイリオ,meiryo,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:16.002px">警察と消防、自衛隊は、雨のため中断していた捜索を２２日に再開し、２３日もおよそ５５０人の態勢でショベルカーなどが土砂を掘り起こす作業などに当たっています。</span><br />\r\n<span style="font-family:ヒラギノ角ゴ pron w3,hiragino kaku gothic pron,メイリオ,meiryo,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:16.002px">２３日は熊本県警察本部の警察犬２頭も捜索に加わっていて、天候の状況を見ながら２４時間態勢で捜索を続ける方針です。</span><br />\r\n<span style="font-family:ヒラギノ角ゴ pron w3,hiragino kaku gothic pron,メイリオ,meiryo,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:16.002px">一方、南阿蘇村の阿蘇大橋の付近では、車で走行していたとみられる阿蘇市の大学４年生、大和晃さん（２２）の行方が分からなくなっています。</span><br />\r\n<span style="font-family:ヒラギノ角ゴ pron w3,hiragino kaku gothic pron,メイリオ,meiryo,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:16.002px">阿蘇大橋の付近は二次災害のおそれがあるため、国土交通省などが、遠隔で操作できる無人の重機を使って現場の土砂を掘り起こすなどして捜索を進めています。</span></p>\r\n', '今回の地震で大規模な土砂崩れが起きた熊本県南阿蘇村では、今も２人の行方が分からなくなっていて、２３日も、警察などが捜索を続けています。', 1461382208, 1461382208),
(12, '九州新幹線・博多ー熊本 ９日ぶりに運転再開', 'oshibori_white_w70_01_571aec72d6a4b.jpg', '<p>九州新幹線は、今月１４日の地震で回送列車が脱線したほか、防音壁や高架橋などの設備、およそ１５０か所で損傷が見つかり、全線で運転ができなくなりました。<br />\r\n今月２０日に熊本県の新水俣と鹿児島中央の間で運転を再開しましたが、２２日までに博多と熊本の間の復旧工事が終わったことから、ＪＲ九州は、２３日６時からこの区間で試験運転を行いました。<br />\r\nその結果、安全が確認されたとして、９日ぶりに運転を再開することを決め、２３日正午前に博多と熊本からそれぞれ新幹線が出発しました。ただ、一部の区間で徐行運転を行うことから通常５０分程度の所要時間が１時間５分程度かかるほか、本数も大幅に減らして当面は各駅停車のみの運行になるということです。<br />\r\n一方、九州新幹線の熊本と新水俣の間は、新幹線の車両が脱線したままになっていることなどから、運転再開の見通しは立っていないということです。</p>\r\n\r\n<h2 style="font-style:inherit"><strong>乗客「運転再開はうれしい」</strong></h2>\r\n\r\n<p>九州新幹線で熊本に向かうという福岡市の５０歳の女性は、「熊本市で避難生活をしている家族に、生活用品や食事を持っていきます。新幹線が通ったら行こうと思って、ずっと待っていました。自分も役に立ちたかったので、役に立てるのがうれしい」と話していました。<br />\r\nまた、熊本市の６７歳の女性は、「福岡の親戚の家に１週間避難していましたが、熊本の家の様子を見に行ってきます。家に被害はありませんでしたが、部屋がめちゃくちゃになっているので、片付けようと思います。新幹線の運転再開はうれしいです」と話していました。<br />\r\n静岡県の２９歳の男性は、「医療関係の仕事をしていて、１週間働きづめになっている現場の医療スタッフの支援ができればいいと思い、ボランティアに行きます。新幹線が再開することで、熊本に行ける人も多くなると思います。復旧には、長い時間がかかると思いますが、その最初の１歩だと思います」と話していました。</p>\r\n', 'ＪＲ九州は、地震の影響で運転できなくなっていた九州新幹線の博多と熊本の間について、復旧工事が終わり、試験運転で安全が確認されたとして、２３日正午前から、この区間の運転を再開しました。', 1461382259, 1461382259),
(13, '避難生活の負担などで死亡１２人に', 'oshibori_brown_w80_01_571aec87c9051.jpg', '<p><span style="font-family:ヒラギノ角ゴ pron w3,hiragino kaku gothic pron,メイリオ,meiryo,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:16.002px">熊本県災害対策本部は、今月１６日の地震で倒壊した自宅の下敷きになり、５日後の２１日、搬送先の病院で死亡した南阿蘇村の６９歳の女性について、体への負担など一連の地震の影響で亡くなったと思われるケースにあたると発表しました。一連の地震で、避難生活による体への負担や病気などによって亡くなったと思われる人は、これで、５つの市町村で１２人になりました。</span></p>\r\n', '熊本県災害対策本部は、今月１６日の地震で倒壊した自宅の下敷きになり、５日後の２１日、搬送先の病院で死亡した南阿蘇村の６９歳の女性について、体への負担など一連の地震の影響で亡くなったと思われるケースにあたると発表しました。一連の地震で、避難生活による体への負担や病気などによって亡くなったと思われる人は、これで、５つの市町村で１２人になりました。', 1461382279, 1461382279),
(14, 'Ｇ７農相会合 会場周辺で警戒続く 新潟', 'oshibori_brown_w80_01_571aedd4e4606.jpg', '<p><span style="font-family:ヒラギノ角ゴ pron w3,hiragino kaku gothic pron,メイリオ,meiryo,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:16.002px">Ｇ７＝主要７か国の農相会合は２３日と２４日、新潟市で開かれ、「伊勢志摩サミット」に合わせて行われる閣僚会合では、広島市での外相会合に続く２番目の開催となります。</span><br />\r\n<span style="font-family:ヒラギノ角ゴ pron w3,hiragino kaku gothic pron,メイリオ,meiryo,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:16.002px">会場となる新潟市中央区の複合施設「朱鷺メッセ」では施設に通じるおよそ１キロの道路でテロなどを防ごうと警察による検問が行われています。</span><br />\r\n<span style="font-family:ヒラギノ角ゴ pron w3,hiragino kaku gothic pron,メイリオ,meiryo,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:16.002px">警察官は道路を通る車を停車させて、ドライバーに免許証の提示を求め、鏡のついた棒を使って車両の底の部分を見たり、トランクを開けたりして、不審物がないか確認していました。</span><br />\r\n<span style="font-family:ヒラギノ角ゴ pron w3,hiragino kaku gothic pron,メイリオ,meiryo,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:16.002px">会合が始まるのは午後からで、警察による警戒は施設の中でも行われているほか、会場脇の信濃川でも海上保安本部による警戒が続いています。</span></p>\r\n', '来月、三重県で行われる「伊勢志摩サミット」に合わせて行われる閣僚会合の１つ、Ｇ７＝主要７か国の農相会合が午後から新潟市で始まります。会場の周辺ではテロなどを防ごうと車両の検問が行われるなど警戒が続いています。', 1461382613, 1461382303),
(15, '熊本・南阿蘇村 不明２人の捜索続く', 'oshibori_yellow01_w70_01_571aec3fd9597.jpg', '<p><span style="font-family:ヒラギノ角ゴ pron w3,hiragino kaku gothic pron,メイリオ,meiryo,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:16.002px">南阿蘇村河陽の高野台地区では、今回の地震で大規模な土砂崩れが起き、この地区にいたとみられる早川海南男さんの行方が、依然分からないままとなっています。</span><br />\r\n<span style="font-family:ヒラギノ角ゴ pron w3,hiragino kaku gothic pron,メイリオ,meiryo,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:16.002px">警察と消防、自衛隊は、雨のため中断していた捜索を２２日に再開し、２３日もおよそ５５０人の態勢でショベルカーなどが土砂を掘り起こす作業などに当たっています。</span><br />\r\n<span style="font-family:ヒラギノ角ゴ pron w3,hiragino kaku gothic pron,メイリオ,meiryo,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:16.002px">２３日は熊本県警察本部の警察犬２頭も捜索に加わっていて、天候の状況を見ながら２４時間態勢で捜索を続ける方針です。</span><br />\r\n<span style="font-family:ヒラギノ角ゴ pron w3,hiragino kaku gothic pron,メイリオ,meiryo,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:16.002px">一方、南阿蘇村の阿蘇大橋の付近では、車で走行していたとみられる阿蘇市の大学４年生、大和晃さん（２２）の行方が分からなくなっています。</span><br />\r\n<span style="font-family:ヒラギノ角ゴ pron w3,hiragino kaku gothic pron,メイリオ,meiryo,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:16.002px">阿蘇大橋の付近は二次災害のおそれがあるため、国土交通省などが、遠隔で操作できる無人の重機を使って現場の土砂を掘り起こすなどして捜索を進めています。</span></p>\r\n', '今回の地震で大規模な土砂崩れが起きた熊本県南阿蘇村では、今も２人の行方が分からなくなっていて、２３日も、警察などが捜索を続けています。', 1461382208, 1461382208),
(16, '熊本・南阿蘇村 不明２人の捜索続く', 'oshibori_yellow01_w70_01_571aec3fd9597.jpg', '<p><span style="font-family:ヒラギノ角ゴ pron w3,hiragino kaku gothic pron,メイリオ,meiryo,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:16.002px">南阿蘇村河陽の高野台地区では、今回の地震で大規模な土砂崩れが起き、この地区にいたとみられる早川海南男さんの行方が、依然分からないままとなっています。</span><br />\r\n<span style="font-family:ヒラギノ角ゴ pron w3,hiragino kaku gothic pron,メイリオ,meiryo,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:16.002px">警察と消防、自衛隊は、雨のため中断していた捜索を２２日に再開し、２３日もおよそ５５０人の態勢でショベルカーなどが土砂を掘り起こす作業などに当たっています。</span><br />\r\n<span style="font-family:ヒラギノ角ゴ pron w3,hiragino kaku gothic pron,メイリオ,meiryo,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:16.002px">２３日は熊本県警察本部の警察犬２頭も捜索に加わっていて、天候の状況を見ながら２４時間態勢で捜索を続ける方針です。</span><br />\r\n<span style="font-family:ヒラギノ角ゴ pron w3,hiragino kaku gothic pron,メイリオ,meiryo,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:16.002px">一方、南阿蘇村の阿蘇大橋の付近では、車で走行していたとみられる阿蘇市の大学４年生、大和晃さん（２２）の行方が分からなくなっています。</span><br />\r\n<span style="font-family:ヒラギノ角ゴ pron w3,hiragino kaku gothic pron,メイリオ,meiryo,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:16.002px">阿蘇大橋の付近は二次災害のおそれがあるため、国土交通省などが、遠隔で操作できる無人の重機を使って現場の土砂を掘り起こすなどして捜索を進めています。</span></p>\r\n', '今回の地震で大規模な土砂崩れが起きた熊本県南阿蘇村では、今も２人の行方が分からなくなっていて、２３日も、警察などが捜索を続けています。', 1461382208, 1461382208),
(17, '熊本・南阿蘇村 不明２人の捜索続く', 'oshibori_yellow01_w70_01_571aec3fd9597.jpg', '<p><span style="font-family:ヒラギノ角ゴ pron w3,hiragino kaku gothic pron,メイリオ,meiryo,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:16.002px">南阿蘇村河陽の高野台地区では、今回の地震で大規模な土砂崩れが起き、この地区にいたとみられる早川海南男さんの行方が、依然分からないままとなっています。</span><br />\r\n<span style="font-family:ヒラギノ角ゴ pron w3,hiragino kaku gothic pron,メイリオ,meiryo,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:16.002px">警察と消防、自衛隊は、雨のため中断していた捜索を２２日に再開し、２３日もおよそ５５０人の態勢でショベルカーなどが土砂を掘り起こす作業などに当たっています。</span><br />\r\n<span style="font-family:ヒラギノ角ゴ pron w3,hiragino kaku gothic pron,メイリオ,meiryo,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:16.002px">２３日は熊本県警察本部の警察犬２頭も捜索に加わっていて、天候の状況を見ながら２４時間態勢で捜索を続ける方針です。</span><br />\r\n<span style="font-family:ヒラギノ角ゴ pron w3,hiragino kaku gothic pron,メイリオ,meiryo,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:16.002px">一方、南阿蘇村の阿蘇大橋の付近では、車で走行していたとみられる阿蘇市の大学４年生、大和晃さん（２２）の行方が分からなくなっています。</span><br />\r\n<span style="font-family:ヒラギノ角ゴ pron w3,hiragino kaku gothic pron,メイリオ,meiryo,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:16.002px">阿蘇大橋の付近は二次災害のおそれがあるため、国土交通省などが、遠隔で操作できる無人の重機を使って現場の土砂を掘り起こすなどして捜索を進めています。</span></p>\r\n', '今回の地震で大規模な土砂崩れが起きた熊本県南阿蘇村では、今も２人の行方が分からなくなっていて、２３日も、警察などが捜索を続けています。', 1461382208, 1461382208),
(18, '熊本・南阿蘇村 不明２人の捜索続く', 'oshibori_yellow01_w70_01_571aec3fd9597.jpg', '<p><span style="font-family:ヒラギノ角ゴ pron w3,hiragino kaku gothic pron,メイリオ,meiryo,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:16.002px">南阿蘇村河陽の高野台地区では、今回の地震で大規模な土砂崩れが起き、この地区にいたとみられる早川海南男さんの行方が、依然分からないままとなっています。</span><br />\r\n<span style="font-family:ヒラギノ角ゴ pron w3,hiragino kaku gothic pron,メイリオ,meiryo,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:16.002px">警察と消防、自衛隊は、雨のため中断していた捜索を２２日に再開し、２３日もおよそ５５０人の態勢でショベルカーなどが土砂を掘り起こす作業などに当たっています。</span><br />\r\n<span style="font-family:ヒラギノ角ゴ pron w3,hiragino kaku gothic pron,メイリオ,meiryo,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:16.002px">２３日は熊本県警察本部の警察犬２頭も捜索に加わっていて、天候の状況を見ながら２４時間態勢で捜索を続ける方針です。</span><br />\r\n<span style="font-family:ヒラギノ角ゴ pron w3,hiragino kaku gothic pron,メイリオ,meiryo,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:16.002px">一方、南阿蘇村の阿蘇大橋の付近では、車で走行していたとみられる阿蘇市の大学４年生、大和晃さん（２２）の行方が分からなくなっています。</span><br />\r\n<span style="font-family:ヒラギノ角ゴ pron w3,hiragino kaku gothic pron,メイリオ,meiryo,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:16.002px">阿蘇大橋の付近は二次災害のおそれがあるため、国土交通省などが、遠隔で操作できる無人の重機を使って現場の土砂を掘り起こすなどして捜索を進めています。</span></p>\r\n', '今回の地震で大規模な土砂崩れが起きた熊本県南阿蘇村では、今も２人の行方が分からなくなっていて、２３日も、警察などが捜索を続けています。', 1461382208, 1461382208),
(19, '熊本・南阿蘇村 不明２人の捜索続く', 'oshibori_yellow01_w70_01_571aec3fd9597.jpg', '<p><span style="font-family:ヒラギノ角ゴ pron w3,hiragino kaku gothic pron,メイリオ,meiryo,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:16.002px">南阿蘇村河陽の高野台地区では、今回の地震で大規模な土砂崩れが起き、この地区にいたとみられる早川海南男さんの行方が、依然分からないままとなっています。</span><br />\r\n<span style="font-family:ヒラギノ角ゴ pron w3,hiragino kaku gothic pron,メイリオ,meiryo,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:16.002px">警察と消防、自衛隊は、雨のため中断していた捜索を２２日に再開し、２３日もおよそ５５０人の態勢でショベルカーなどが土砂を掘り起こす作業などに当たっています。</span><br />\r\n<span style="font-family:ヒラギノ角ゴ pron w3,hiragino kaku gothic pron,メイリオ,meiryo,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:16.002px">２３日は熊本県警察本部の警察犬２頭も捜索に加わっていて、天候の状況を見ながら２４時間態勢で捜索を続ける方針です。</span><br />\r\n<span style="font-family:ヒラギノ角ゴ pron w3,hiragino kaku gothic pron,メイリオ,meiryo,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:16.002px">一方、南阿蘇村の阿蘇大橋の付近では、車で走行していたとみられる阿蘇市の大学４年生、大和晃さん（２２）の行方が分からなくなっています。</span><br />\r\n<span style="font-family:ヒラギノ角ゴ pron w3,hiragino kaku gothic pron,メイリオ,meiryo,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:16.002px">阿蘇大橋の付近は二次災害のおそれがあるため、国土交通省などが、遠隔で操作できる無人の重機を使って現場の土砂を掘り起こすなどして捜索を進めています。</span></p>\r\n', '今回の地震で大規模な土砂崩れが起きた熊本県南阿蘇村では、今も２人の行方が分からなくなっていて、２３日も、警察などが捜索を続けています。', 1461382208, 1461382208),
(20, '熊本・南阿蘇村 不明２人の捜索続く', 'oshibori_yellow01_w70_01_571aec3fd9597.jpg', '<p><span style="font-family:ヒラギノ角ゴ pron w3,hiragino kaku gothic pron,メイリオ,meiryo,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:16.002px">南阿蘇村河陽の高野台地区では、今回の地震で大規模な土砂崩れが起き、この地区にいたとみられる早川海南男さんの行方が、依然分からないままとなっています。</span><br />\r\n<span style="font-family:ヒラギノ角ゴ pron w3,hiragino kaku gothic pron,メイリオ,meiryo,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:16.002px">警察と消防、自衛隊は、雨のため中断していた捜索を２２日に再開し、２３日もおよそ５５０人の態勢でショベルカーなどが土砂を掘り起こす作業などに当たっています。</span><br />\r\n<span style="font-family:ヒラギノ角ゴ pron w3,hiragino kaku gothic pron,メイリオ,meiryo,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:16.002px">２３日は熊本県警察本部の警察犬２頭も捜索に加わっていて、天候の状況を見ながら２４時間態勢で捜索を続ける方針です。</span><br />\r\n<span style="font-family:ヒラギノ角ゴ pron w3,hiragino kaku gothic pron,メイリオ,meiryo,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:16.002px">一方、南阿蘇村の阿蘇大橋の付近では、車で走行していたとみられる阿蘇市の大学４年生、大和晃さん（２２）の行方が分からなくなっています。</span><br />\r\n<span style="font-family:ヒラギノ角ゴ pron w3,hiragino kaku gothic pron,メイリオ,meiryo,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:16.002px">阿蘇大橋の付近は二次災害のおそれがあるため、国土交通省などが、遠隔で操作できる無人の重機を使って現場の土砂を掘り起こすなどして捜索を進めています。</span></p>\r\n', '今回の地震で大規模な土砂崩れが起きた熊本県南阿蘇村では、今も２人の行方が分からなくなっていて、２３日も、警察などが捜索を続けています。', 1461382208, 1461382208),
(21, '熊本・南阿蘇村 不明２人の捜索続く', 'oshibori_yellow01_w70_01_571aec3fd9597.jpg', '<p><span style="font-family:ヒラギノ角ゴ pron w3,hiragino kaku gothic pron,メイリオ,meiryo,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:16.002px">南阿蘇村河陽の高野台地区では、今回の地震で大規模な土砂崩れが起き、この地区にいたとみられる早川海南男さんの行方が、依然分からないままとなっています。</span><br />\r\n<span style="font-family:ヒラギノ角ゴ pron w3,hiragino kaku gothic pron,メイリオ,meiryo,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:16.002px">警察と消防、自衛隊は、雨のため中断していた捜索を２２日に再開し、２３日もおよそ５５０人の態勢でショベルカーなどが土砂を掘り起こす作業などに当たっています。</span><br />\r\n<span style="font-family:ヒラギノ角ゴ pron w3,hiragino kaku gothic pron,メイリオ,meiryo,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:16.002px">２３日は熊本県警察本部の警察犬２頭も捜索に加わっていて、天候の状況を見ながら２４時間態勢で捜索を続ける方針です。</span><br />\r\n<span style="font-family:ヒラギノ角ゴ pron w3,hiragino kaku gothic pron,メイリオ,meiryo,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:16.002px">一方、南阿蘇村の阿蘇大橋の付近では、車で走行していたとみられる阿蘇市の大学４年生、大和晃さん（２２）の行方が分からなくなっています。</span><br />\r\n<span style="font-family:ヒラギノ角ゴ pron w3,hiragino kaku gothic pron,メイリオ,meiryo,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:16.002px">阿蘇大橋の付近は二次災害のおそれがあるため、国土交通省などが、遠隔で操作できる無人の重機を使って現場の土砂を掘り起こすなどして捜索を進めています。</span></p>\r\n', '今回の地震で大規模な土砂崩れが起きた熊本県南阿蘇村では、今も２人の行方が分からなくなっていて、２３日も、警察などが捜索を続けています。', 1461382208, 1461382208),
(22, '熊本・南阿蘇村 不明２人の捜索続く', 'oshibori_yellow01_w70_01_571aec3fd9597.jpg', '<p><span style="font-family:ヒラギノ角ゴ pron w3,hiragino kaku gothic pron,メイリオ,meiryo,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:16.002px">南阿蘇村河陽の高野台地区では、今回の地震で大規模な土砂崩れが起き、この地区にいたとみられる早川海南男さんの行方が、依然分からないままとなっています。</span><br />\r\n<span style="font-family:ヒラギノ角ゴ pron w3,hiragino kaku gothic pron,メイリオ,meiryo,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:16.002px">警察と消防、自衛隊は、雨のため中断していた捜索を２２日に再開し、２３日もおよそ５５０人の態勢でショベルカーなどが土砂を掘り起こす作業などに当たっています。</span><br />\r\n<span style="font-family:ヒラギノ角ゴ pron w3,hiragino kaku gothic pron,メイリオ,meiryo,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:16.002px">２３日は熊本県警察本部の警察犬２頭も捜索に加わっていて、天候の状況を見ながら２４時間態勢で捜索を続ける方針です。</span><br />\r\n<span style="font-family:ヒラギノ角ゴ pron w3,hiragino kaku gothic pron,メイリオ,meiryo,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:16.002px">一方、南阿蘇村の阿蘇大橋の付近では、車で走行していたとみられる阿蘇市の大学４年生、大和晃さん（２２）の行方が分からなくなっています。</span><br />\r\n<span style="font-family:ヒラギノ角ゴ pron w3,hiragino kaku gothic pron,メイリオ,meiryo,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:16.002px">阿蘇大橋の付近は二次災害のおそれがあるため、国土交通省などが、遠隔で操作できる無人の重機を使って現場の土砂を掘り起こすなどして捜索を進めています。</span></p>\r\n', '今回の地震で大規模な土砂崩れが起きた熊本県南阿蘇村では、今も２人の行方が分からなくなっていて、２３日も、警察などが捜索を続けています。', 1461382208, 1461382208),
(23, '熊本・南阿蘇村 不明２人の捜索続く', 'oshibori_yellow01_w70_01_571aec3fd9597.jpg', '<p><span style="font-family:ヒラギノ角ゴ pron w3,hiragino kaku gothic pron,メイリオ,meiryo,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:16.002px">南阿蘇村河陽の高野台地区では、今回の地震で大規模な土砂崩れが起き、この地区にいたとみられる早川海南男さんの行方が、依然分からないままとなっています。</span><br />\r\n<span style="font-family:ヒラギノ角ゴ pron w3,hiragino kaku gothic pron,メイリオ,meiryo,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:16.002px">警察と消防、自衛隊は、雨のため中断していた捜索を２２日に再開し、２３日もおよそ５５０人の態勢でショベルカーなどが土砂を掘り起こす作業などに当たっています。</span><br />\r\n<span style="font-family:ヒラギノ角ゴ pron w3,hiragino kaku gothic pron,メイリオ,meiryo,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:16.002px">２３日は熊本県警察本部の警察犬２頭も捜索に加わっていて、天候の状況を見ながら２４時間態勢で捜索を続ける方針です。</span><br />\r\n<span style="font-family:ヒラギノ角ゴ pron w3,hiragino kaku gothic pron,メイリオ,meiryo,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:16.002px">一方、南阿蘇村の阿蘇大橋の付近では、車で走行していたとみられる阿蘇市の大学４年生、大和晃さん（２２）の行方が分からなくなっています。</span><br />\r\n<span style="font-family:ヒラギノ角ゴ pron w3,hiragino kaku gothic pron,メイリオ,meiryo,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:16.002px">阿蘇大橋の付近は二次災害のおそれがあるため、国土交通省などが、遠隔で操作できる無人の重機を使って現場の土砂を掘り起こすなどして捜索を進めています。</span></p>\r\n', '今回の地震で大規模な土砂崩れが起きた熊本県南阿蘇村では、今も２人の行方が分からなくなっていて、２３日も、警察などが捜索を続けています。', 1461382208, 1461382208),
(24, '熊本・南阿蘇村 不明２人の捜索続く', 'oshibori_yellow01_w70_01_571aec3fd9597.jpg', '<p><span style="font-family:ヒラギノ角ゴ pron w3,hiragino kaku gothic pron,メイリオ,meiryo,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:16.002px">南阿蘇村河陽の高野台地区では、今回の地震で大規模な土砂崩れが起き、この地区にいたとみられる早川海南男さんの行方が、依然分からないままとなっています。</span><br />\r\n<span style="font-family:ヒラギノ角ゴ pron w3,hiragino kaku gothic pron,メイリオ,meiryo,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:16.002px">警察と消防、自衛隊は、雨のため中断していた捜索を２２日に再開し、２３日もおよそ５５０人の態勢でショベルカーなどが土砂を掘り起こす作業などに当たっています。</span><br />\r\n<span style="font-family:ヒラギノ角ゴ pron w3,hiragino kaku gothic pron,メイリオ,meiryo,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:16.002px">２３日は熊本県警察本部の警察犬２頭も捜索に加わっていて、天候の状況を見ながら２４時間態勢で捜索を続ける方針です。</span><br />\r\n<span style="font-family:ヒラギノ角ゴ pron w3,hiragino kaku gothic pron,メイリオ,meiryo,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:16.002px">一方、南阿蘇村の阿蘇大橋の付近では、車で走行していたとみられる阿蘇市の大学４年生、大和晃さん（２２）の行方が分からなくなっています。</span><br />\r\n<span style="font-family:ヒラギノ角ゴ pron w3,hiragino kaku gothic pron,メイリオ,meiryo,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:16.002px">阿蘇大橋の付近は二次災害のおそれがあるため、国土交通省などが、遠隔で操作できる無人の重機を使って現場の土砂を掘り起こすなどして捜索を進めています。</span></p>\r\n', '今回の地震で大規模な土砂崩れが起きた熊本県南阿蘇村では、今も２人の行方が分からなくなっていて、２３日も、警察などが捜索を続けています。', 1461382208, 1461382208),
(25, '熊本・南阿蘇村 不明２人の捜索続く', 'oshibori_yellow01_w70_01_571aec3fd9597.jpg', '<p><span style="font-family:ヒラギノ角ゴ pron w3,hiragino kaku gothic pron,メイリオ,meiryo,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:16.002px">南阿蘇村河陽の高野台地区では、今回の地震で大規模な土砂崩れが起き、この地区にいたとみられる早川海南男さんの行方が、依然分からないままとなっています。</span><br />\r\n<span style="font-family:ヒラギノ角ゴ pron w3,hiragino kaku gothic pron,メイリオ,meiryo,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:16.002px">警察と消防、自衛隊は、雨のため中断していた捜索を２２日に再開し、２３日もおよそ５５０人の態勢でショベルカーなどが土砂を掘り起こす作業などに当たっています。</span><br />\r\n<span style="font-family:ヒラギノ角ゴ pron w3,hiragino kaku gothic pron,メイリオ,meiryo,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:16.002px">２３日は熊本県警察本部の警察犬２頭も捜索に加わっていて、天候の状況を見ながら２４時間態勢で捜索を続ける方針です。</span><br />\r\n<span style="font-family:ヒラギノ角ゴ pron w3,hiragino kaku gothic pron,メイリオ,meiryo,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:16.002px">一方、南阿蘇村の阿蘇大橋の付近では、車で走行していたとみられる阿蘇市の大学４年生、大和晃さん（２２）の行方が分からなくなっています。</span><br />\r\n<span style="font-family:ヒラギノ角ゴ pron w3,hiragino kaku gothic pron,メイリオ,meiryo,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:16.002px">阿蘇大橋の付近は二次災害のおそれがあるため、国土交通省などが、遠隔で操作できる無人の重機を使って現場の土砂を掘り起こすなどして捜索を進めています。</span></p>\r\n', '今回の地震で大規模な土砂崩れが起きた熊本県南阿蘇村では、今も２人の行方が分からなくなっていて、２３日も、警察などが捜索を続けています。', 1461382208, 1461382208),
(26, '熊本・南阿蘇村 不明２人の捜索続く', 'oshibori_yellow01_w70_01_571aec3fd9597.jpg', '<p><span style="font-family:ヒラギノ角ゴ pron w3,hiragino kaku gothic pron,メイリオ,meiryo,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:16.002px">南阿蘇村河陽の高野台地区では、今回の地震で大規模な土砂崩れが起き、この地区にいたとみられる早川海南男さんの行方が、依然分からないままとなっています。</span><br />\r\n<span style="font-family:ヒラギノ角ゴ pron w3,hiragino kaku gothic pron,メイリオ,meiryo,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:16.002px">警察と消防、自衛隊は、雨のため中断していた捜索を２２日に再開し、２３日もおよそ５５０人の態勢でショベルカーなどが土砂を掘り起こす作業などに当たっています。</span><br />\r\n<span style="font-family:ヒラギノ角ゴ pron w3,hiragino kaku gothic pron,メイリオ,meiryo,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:16.002px">２３日は熊本県警察本部の警察犬２頭も捜索に加わっていて、天候の状況を見ながら２４時間態勢で捜索を続ける方針です。</span><br />\r\n<span style="font-family:ヒラギノ角ゴ pron w3,hiragino kaku gothic pron,メイリオ,meiryo,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:16.002px">一方、南阿蘇村の阿蘇大橋の付近では、車で走行していたとみられる阿蘇市の大学４年生、大和晃さん（２２）の行方が分からなくなっています。</span><br />\r\n<span style="font-family:ヒラギノ角ゴ pron w3,hiragino kaku gothic pron,メイリオ,meiryo,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:16.002px">阿蘇大橋の付近は二次災害のおそれがあるため、国土交通省などが、遠隔で操作できる無人の重機を使って現場の土砂を掘り起こすなどして捜索を進めています。</span></p>\r\n', '今回の地震で大規模な土砂崩れが起きた熊本県南阿蘇村では、今も２人の行方が分からなくなっていて、２３日も、警察などが捜索を続けています。', 1461382208, 1461382208),
(27, '熊本・南阿蘇村 不明２人の捜索続く', 'oshibori_yellow01_w70_01_571aec3fd9597.jpg', '<p><span style="font-family:ヒラギノ角ゴ pron w3,hiragino kaku gothic pron,メイリオ,meiryo,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:16.002px">南阿蘇村河陽の高野台地区では、今回の地震で大規模な土砂崩れが起き、この地区にいたとみられる早川海南男さんの行方が、依然分からないままとなっています。</span><br />\r\n<span style="font-family:ヒラギノ角ゴ pron w3,hiragino kaku gothic pron,メイリオ,meiryo,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:16.002px">警察と消防、自衛隊は、雨のため中断していた捜索を２２日に再開し、２３日もおよそ５５０人の態勢でショベルカーなどが土砂を掘り起こす作業などに当たっています。</span><br />\r\n<span style="font-family:ヒラギノ角ゴ pron w3,hiragino kaku gothic pron,メイリオ,meiryo,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:16.002px">２３日は熊本県警察本部の警察犬２頭も捜索に加わっていて、天候の状況を見ながら２４時間態勢で捜索を続ける方針です。</span><br />\r\n<span style="font-family:ヒラギノ角ゴ pron w3,hiragino kaku gothic pron,メイリオ,meiryo,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:16.002px">一方、南阿蘇村の阿蘇大橋の付近では、車で走行していたとみられる阿蘇市の大学４年生、大和晃さん（２２）の行方が分からなくなっています。</span><br />\r\n<span style="font-family:ヒラギノ角ゴ pron w3,hiragino kaku gothic pron,メイリオ,meiryo,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:16.002px">阿蘇大橋の付近は二次災害のおそれがあるため、国土交通省などが、遠隔で操作できる無人の重機を使って現場の土砂を掘り起こすなどして捜索を進めています。</span></p>\r\n', '今回の地震で大規模な土砂崩れが起きた熊本県南阿蘇村では、今も２人の行方が分からなくなっていて、２３日も、警察などが捜索を続けています。', 1461382208, 1461382208),
(28, '熊本・南阿蘇村 不明２人の捜索続く', 'oshibori_yellow01_w70_01_571aec3fd9597.jpg', '<p><span style="font-family:ヒラギノ角ゴ pron w3,hiragino kaku gothic pron,メイリオ,meiryo,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:16.002px">南阿蘇村河陽の高野台地区では、今回の地震で大規模な土砂崩れが起き、この地区にいたとみられる早川海南男さんの行方が、依然分からないままとなっています。</span><br />\r\n<span style="font-family:ヒラギノ角ゴ pron w3,hiragino kaku gothic pron,メイリオ,meiryo,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:16.002px">警察と消防、自衛隊は、雨のため中断していた捜索を２２日に再開し、２３日もおよそ５５０人の態勢でショベルカーなどが土砂を掘り起こす作業などに当たっています。</span><br />\r\n<span style="font-family:ヒラギノ角ゴ pron w3,hiragino kaku gothic pron,メイリオ,meiryo,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:16.002px">２３日は熊本県警察本部の警察犬２頭も捜索に加わっていて、天候の状況を見ながら２４時間態勢で捜索を続ける方針です。</span><br />\r\n<span style="font-family:ヒラギノ角ゴ pron w3,hiragino kaku gothic pron,メイリオ,meiryo,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:16.002px">一方、南阿蘇村の阿蘇大橋の付近では、車で走行していたとみられる阿蘇市の大学４年生、大和晃さん（２２）の行方が分からなくなっています。</span><br />\r\n<span style="font-family:ヒラギノ角ゴ pron w3,hiragino kaku gothic pron,メイリオ,meiryo,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:16.002px">阿蘇大橋の付近は二次災害のおそれがあるため、国土交通省などが、遠隔で操作できる無人の重機を使って現場の土砂を掘り起こすなどして捜索を進めています。</span></p>\r\n', '今回の地震で大規模な土砂崩れが起きた熊本県南阿蘇村では、今も２人の行方が分からなくなっていて、２３日も、警察などが捜索を続けています。', 1461382208, 1461382208),
(29, '熊本・南阿蘇村 不明２人の捜索続く', 'oshibori_yellow01_w70_01_571aec3fd9597.jpg', '<p><span style="font-family:ヒラギノ角ゴ pron w3,hiragino kaku gothic pron,メイリオ,meiryo,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:16.002px">南阿蘇村河陽の高野台地区では、今回の地震で大規模な土砂崩れが起き、この地区にいたとみられる早川海南男さんの行方が、依然分からないままとなっています。</span><br />\r\n<span style="font-family:ヒラギノ角ゴ pron w3,hiragino kaku gothic pron,メイリオ,meiryo,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:16.002px">警察と消防、自衛隊は、雨のため中断していた捜索を２２日に再開し、２３日もおよそ５５０人の態勢でショベルカーなどが土砂を掘り起こす作業などに当たっています。</span><br />\r\n<span style="font-family:ヒラギノ角ゴ pron w3,hiragino kaku gothic pron,メイリオ,meiryo,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:16.002px">２３日は熊本県警察本部の警察犬２頭も捜索に加わっていて、天候の状況を見ながら２４時間態勢で捜索を続ける方針です。</span><br />\r\n<span style="font-family:ヒラギノ角ゴ pron w3,hiragino kaku gothic pron,メイリオ,meiryo,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:16.002px">一方、南阿蘇村の阿蘇大橋の付近では、車で走行していたとみられる阿蘇市の大学４年生、大和晃さん（２２）の行方が分からなくなっています。</span><br />\r\n<span style="font-family:ヒラギノ角ゴ pron w3,hiragino kaku gothic pron,メイリオ,meiryo,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:16.002px">阿蘇大橋の付近は二次災害のおそれがあるため、国土交通省などが、遠隔で操作できる無人の重機を使って現場の土砂を掘り起こすなどして捜索を進めています。</span></p>\r\n', '今回の地震で大規模な土砂崩れが起きた熊本県南阿蘇村では、今も２人の行方が分からなくなっていて、２３日も、警察などが捜索を続けています。', 1461382208, 1461382208),
(30, '熊本・南阿蘇村 不明２人の捜索続く', 'oshibori_yellow01_w70_01_571aec3fd9597.jpg', '<p><span style="font-family:ヒラギノ角ゴ pron w3,hiragino kaku gothic pron,メイリオ,meiryo,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:16.002px">南阿蘇村河陽の高野台地区では、今回の地震で大規模な土砂崩れが起き、この地区にいたとみられる早川海南男さんの行方が、依然分からないままとなっています。</span><br />\r\n<span style="font-family:ヒラギノ角ゴ pron w3,hiragino kaku gothic pron,メイリオ,meiryo,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:16.002px">警察と消防、自衛隊は、雨のため中断していた捜索を２２日に再開し、２３日もおよそ５５０人の態勢でショベルカーなどが土砂を掘り起こす作業などに当たっています。</span><br />\r\n<span style="font-family:ヒラギノ角ゴ pron w3,hiragino kaku gothic pron,メイリオ,meiryo,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:16.002px">２３日は熊本県警察本部の警察犬２頭も捜索に加わっていて、天候の状況を見ながら２４時間態勢で捜索を続ける方針です。</span><br />\r\n<span style="font-family:ヒラギノ角ゴ pron w3,hiragino kaku gothic pron,メイリオ,meiryo,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:16.002px">一方、南阿蘇村の阿蘇大橋の付近では、車で走行していたとみられる阿蘇市の大学４年生、大和晃さん（２２）の行方が分からなくなっています。</span><br />\r\n<span style="font-family:ヒラギノ角ゴ pron w3,hiragino kaku gothic pron,メイリオ,meiryo,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:16.002px">阿蘇大橋の付近は二次災害のおそれがあるため、国土交通省などが、遠隔で操作できる無人の重機を使って現場の土砂を掘り起こすなどして捜索を進めています。</span></p>\r\n', '今回の地震で大規模な土砂崩れが起きた熊本県南阿蘇村では、今も２人の行方が分からなくなっていて、２３日も、警察などが捜索を続けています。', 1461382208, 1461382208),
(31, '熊本・南阿蘇村 不明２人の捜索続く', 'oshibori_yellow01_w70_01_571aec3fd9597.jpg', '<p><span style="font-family:ヒラギノ角ゴ pron w3,hiragino kaku gothic pron,メイリオ,meiryo,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:16.002px">南阿蘇村河陽の高野台地区では、今回の地震で大規模な土砂崩れが起き、この地区にいたとみられる早川海南男さんの行方が、依然分からないままとなっています。</span><br />\r\n<span style="font-family:ヒラギノ角ゴ pron w3,hiragino kaku gothic pron,メイリオ,meiryo,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:16.002px">警察と消防、自衛隊は、雨のため中断していた捜索を２２日に再開し、２３日もおよそ５５０人の態勢でショベルカーなどが土砂を掘り起こす作業などに当たっています。</span><br />\r\n<span style="font-family:ヒラギノ角ゴ pron w3,hiragino kaku gothic pron,メイリオ,meiryo,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:16.002px">２３日は熊本県警察本部の警察犬２頭も捜索に加わっていて、天候の状況を見ながら２４時間態勢で捜索を続ける方針です。</span><br />\r\n<span style="font-family:ヒラギノ角ゴ pron w3,hiragino kaku gothic pron,メイリオ,meiryo,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:16.002px">一方、南阿蘇村の阿蘇大橋の付近では、車で走行していたとみられる阿蘇市の大学４年生、大和晃さん（２２）の行方が分からなくなっています。</span><br />\r\n<span style="font-family:ヒラギノ角ゴ pron w3,hiragino kaku gothic pron,メイリオ,meiryo,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:16.002px">阿蘇大橋の付近は二次災害のおそれがあるため、国土交通省などが、遠隔で操作できる無人の重機を使って現場の土砂を掘り起こすなどして捜索を進めています。</span></p>\r\n', '今回の地震で大規模な土砂崩れが起きた熊本県南阿蘇村では、今も２人の行方が分からなくなっていて、２３日も、警察などが捜索を続けています。', 1461382208, 1461382208),
(32, '熊本・南阿蘇村 不明２人の捜索続く', 'oshibori_yellow01_w70_01_571aec3fd9597.jpg', '<p><span style="font-family:ヒラギノ角ゴ pron w3,hiragino kaku gothic pron,メイリオ,meiryo,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:16.002px">南阿蘇村河陽の高野台地区では、今回の地震で大規模な土砂崩れが起き、この地区にいたとみられる早川海南男さんの行方が、依然分からないままとなっています。</span><br />\r\n<span style="font-family:ヒラギノ角ゴ pron w3,hiragino kaku gothic pron,メイリオ,meiryo,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:16.002px">警察と消防、自衛隊は、雨のため中断していた捜索を２２日に再開し、２３日もおよそ５５０人の態勢でショベルカーなどが土砂を掘り起こす作業などに当たっています。</span><br />\r\n<span style="font-family:ヒラギノ角ゴ pron w3,hiragino kaku gothic pron,メイリオ,meiryo,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:16.002px">２３日は熊本県警察本部の警察犬２頭も捜索に加わっていて、天候の状況を見ながら２４時間態勢で捜索を続ける方針です。</span><br />\r\n<span style="font-family:ヒラギノ角ゴ pron w3,hiragino kaku gothic pron,メイリオ,meiryo,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:16.002px">一方、南阿蘇村の阿蘇大橋の付近では、車で走行していたとみられる阿蘇市の大学４年生、大和晃さん（２２）の行方が分からなくなっています。</span><br />\r\n<span style="font-family:ヒラギノ角ゴ pron w3,hiragino kaku gothic pron,メイリオ,meiryo,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:16.002px">阿蘇大橋の付近は二次災害のおそれがあるため、国土交通省などが、遠隔で操作できる無人の重機を使って現場の土砂を掘り起こすなどして捜索を進めています。</span></p>\r\n', '今回の地震で大規模な土砂崩れが起きた熊本県南阿蘇村では、今も２人の行方が分からなくなっていて、２３日も、警察などが捜索を続けています。', 1461382208, 1461382208),
(33, '熊本・南阿蘇村 不明２人の捜索続く', 'oshibori_yellow01_w70_01_571aec3fd9597.jpg', '<p><span style="font-family:ヒラギノ角ゴ pron w3,hiragino kaku gothic pron,メイリオ,meiryo,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:16.002px">南阿蘇村河陽の高野台地区では、今回の地震で大規模な土砂崩れが起き、この地区にいたとみられる早川海南男さんの行方が、依然分からないままとなっています。</span><br />\r\n<span style="font-family:ヒラギノ角ゴ pron w3,hiragino kaku gothic pron,メイリオ,meiryo,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:16.002px">警察と消防、自衛隊は、雨のため中断していた捜索を２２日に再開し、２３日もおよそ５５０人の態勢でショベルカーなどが土砂を掘り起こす作業などに当たっています。</span><br />\r\n<span style="font-family:ヒラギノ角ゴ pron w3,hiragino kaku gothic pron,メイリオ,meiryo,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:16.002px">２３日は熊本県警察本部の警察犬２頭も捜索に加わっていて、天候の状況を見ながら２４時間態勢で捜索を続ける方針です。</span><br />\r\n<span style="font-family:ヒラギノ角ゴ pron w3,hiragino kaku gothic pron,メイリオ,meiryo,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:16.002px">一方、南阿蘇村の阿蘇大橋の付近では、車で走行していたとみられる阿蘇市の大学４年生、大和晃さん（２２）の行方が分からなくなっています。</span><br />\r\n<span style="font-family:ヒラギノ角ゴ pron w3,hiragino kaku gothic pron,メイリオ,meiryo,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:16.002px">阿蘇大橋の付近は二次災害のおそれがあるため、国土交通省などが、遠隔で操作できる無人の重機を使って現場の土砂を掘り起こすなどして捜索を進めています。</span></p>\r\n', '今回の地震で大規模な土砂崩れが起きた熊本県南阿蘇村では、今も２人の行方が分からなくなっていて、２３日も、警察などが捜索を続けています。', 1461382208, 1461382208),
(34, '九州新幹線・博多ー熊本 ９日ぶりに運転再開', 'oshibori_white_w70_01_571aec72d6a4b.jpg', '<p>九州新幹線は、今月１４日の地震で回送列車が脱線したほか、防音壁や高架橋などの設備、およそ１５０か所で損傷が見つかり、全線で運転ができなくなりました。<br />\r\n今月２０日に熊本県の新水俣と鹿児島中央の間で運転を再開しましたが、２２日までに博多と熊本の間の復旧工事が終わったことから、ＪＲ九州は、２３日６時からこの区間で試験運転を行いました。<br />\r\nその結果、安全が確認されたとして、９日ぶりに運転を再開することを決め、２３日正午前に博多と熊本からそれぞれ新幹線が出発しました。ただ、一部の区間で徐行運転を行うことから通常５０分程度の所要時間が１時間５分程度かかるほか、本数も大幅に減らして当面は各駅停車のみの運行になるということです。<br />\r\n一方、九州新幹線の熊本と新水俣の間は、新幹線の車両が脱線したままになっていることなどから、運転再開の見通しは立っていないということです。</p>\r\n\r\n<h2 style="font-style:inherit"><strong>乗客「運転再開はうれしい」</strong></h2>\r\n\r\n<p>九州新幹線で熊本に向かうという福岡市の５０歳の女性は、「熊本市で避難生活をしている家族に、生活用品や食事を持っていきます。新幹線が通ったら行こうと思って、ずっと待っていました。自分も役に立ちたかったので、役に立てるのがうれしい」と話していました。<br />\r\nまた、熊本市の６７歳の女性は、「福岡の親戚の家に１週間避難していましたが、熊本の家の様子を見に行ってきます。家に被害はありませんでしたが、部屋がめちゃくちゃになっているので、片付けようと思います。新幹線の運転再開はうれしいです」と話していました。<br />\r\n静岡県の２９歳の男性は、「医療関係の仕事をしていて、１週間働きづめになっている現場の医療スタッフの支援ができればいいと思い、ボランティアに行きます。新幹線が再開することで、熊本に行ける人も多くなると思います。復旧には、長い時間がかかると思いますが、その最初の１歩だと思います」と話していました。</p>\r\n', 'ＪＲ九州は、地震の影響で運転できなくなっていた九州新幹線の博多と熊本の間について、復旧工事が終わり、試験運転で安全が確認されたとして、２３日正午前から、この区間の運転を再開しました。', 1461382259, 1461382259),
(35, '九州新幹線・博多ー熊本 ９日ぶりに運転再開', 'oshibori_white_w70_01_571aec72d6a4b.jpg', '<p>九州新幹線は、今月１４日の地震で回送列車が脱線したほか、防音壁や高架橋などの設備、およそ１５０か所で損傷が見つかり、全線で運転ができなくなりました。<br />\r\n今月２０日に熊本県の新水俣と鹿児島中央の間で運転を再開しましたが、２２日までに博多と熊本の間の復旧工事が終わったことから、ＪＲ九州は、２３日６時からこの区間で試験運転を行いました。<br />\r\nその結果、安全が確認されたとして、９日ぶりに運転を再開することを決め、２３日正午前に博多と熊本からそれぞれ新幹線が出発しました。ただ、一部の区間で徐行運転を行うことから通常５０分程度の所要時間が１時間５分程度かかるほか、本数も大幅に減らして当面は各駅停車のみの運行になるということです。<br />\r\n一方、九州新幹線の熊本と新水俣の間は、新幹線の車両が脱線したままになっていることなどから、運転再開の見通しは立っていないということです。</p>\r\n\r\n<h2 style="font-style:inherit"><strong>乗客「運転再開はうれしい」</strong></h2>\r\n\r\n<p>九州新幹線で熊本に向かうという福岡市の５０歳の女性は、「熊本市で避難生活をしている家族に、生活用品や食事を持っていきます。新幹線が通ったら行こうと思って、ずっと待っていました。自分も役に立ちたかったので、役に立てるのがうれしい」と話していました。<br />\r\nまた、熊本市の６７歳の女性は、「福岡の親戚の家に１週間避難していましたが、熊本の家の様子を見に行ってきます。家に被害はありませんでしたが、部屋がめちゃくちゃになっているので、片付けようと思います。新幹線の運転再開はうれしいです」と話していました。<br />\r\n静岡県の２９歳の男性は、「医療関係の仕事をしていて、１週間働きづめになっている現場の医療スタッフの支援ができればいいと思い、ボランティアに行きます。新幹線が再開することで、熊本に行ける人も多くなると思います。復旧には、長い時間がかかると思いますが、その最初の１歩だと思います」と話していました。</p>\r\n', 'ＪＲ九州は、地震の影響で運転できなくなっていた九州新幹線の博多と熊本の間について、復旧工事が終わり、試験運転で安全が確認されたとして、２３日正午前から、この区間の運転を再開しました。', 1461382259, 1461382259),
(36, '九州新幹線・博多ー熊本 ９日ぶりに運転再開', 'oshibori_white_w70_01_571aec72d6a4b.jpg', '<p>九州新幹線は、今月１４日の地震で回送列車が脱線したほか、防音壁や高架橋などの設備、およそ１５０か所で損傷が見つかり、全線で運転ができなくなりました。<br />\r\n今月２０日に熊本県の新水俣と鹿児島中央の間で運転を再開しましたが、２２日までに博多と熊本の間の復旧工事が終わったことから、ＪＲ九州は、２３日６時からこの区間で試験運転を行いました。<br />\r\nその結果、安全が確認されたとして、９日ぶりに運転を再開することを決め、２３日正午前に博多と熊本からそれぞれ新幹線が出発しました。ただ、一部の区間で徐行運転を行うことから通常５０分程度の所要時間が１時間５分程度かかるほか、本数も大幅に減らして当面は各駅停車のみの運行になるということです。<br />\r\n一方、九州新幹線の熊本と新水俣の間は、新幹線の車両が脱線したままになっていることなどから、運転再開の見通しは立っていないということです。</p>\r\n\r\n<h2 style="font-style:inherit"><strong>乗客「運転再開はうれしい」</strong></h2>\r\n\r\n<p>九州新幹線で熊本に向かうという福岡市の５０歳の女性は、「熊本市で避難生活をしている家族に、生活用品や食事を持っていきます。新幹線が通ったら行こうと思って、ずっと待っていました。自分も役に立ちたかったので、役に立てるのがうれしい」と話していました。<br />\r\nまた、熊本市の６７歳の女性は、「福岡の親戚の家に１週間避難していましたが、熊本の家の様子を見に行ってきます。家に被害はありませんでしたが、部屋がめちゃくちゃになっているので、片付けようと思います。新幹線の運転再開はうれしいです」と話していました。<br />\r\n静岡県の２９歳の男性は、「医療関係の仕事をしていて、１週間働きづめになっている現場の医療スタッフの支援ができればいいと思い、ボランティアに行きます。新幹線が再開することで、熊本に行ける人も多くなると思います。復旧には、長い時間がかかると思いますが、その最初の１歩だと思います」と話していました。</p>\r\n', 'ＪＲ九州は、地震の影響で運転できなくなっていた九州新幹線の博多と熊本の間について、復旧工事が終わり、試験運転で安全が確認されたとして、２３日正午前から、この区間の運転を再開しました。', 1461382259, 1461382259),
(37, '九州新幹線・博多ー熊本 ９日ぶりに運転再開', 'oshibori_white_w70_01_571aec72d6a4b.jpg', '<p>九州新幹線は、今月１４日の地震で回送列車が脱線したほか、防音壁や高架橋などの設備、およそ１５０か所で損傷が見つかり、全線で運転ができなくなりました。<br />\r\n今月２０日に熊本県の新水俣と鹿児島中央の間で運転を再開しましたが、２２日までに博多と熊本の間の復旧工事が終わったことから、ＪＲ九州は、２３日６時からこの区間で試験運転を行いました。<br />\r\nその結果、安全が確認されたとして、９日ぶりに運転を再開することを決め、２３日正午前に博多と熊本からそれぞれ新幹線が出発しました。ただ、一部の区間で徐行運転を行うことから通常５０分程度の所要時間が１時間５分程度かかるほか、本数も大幅に減らして当面は各駅停車のみの運行になるということです。<br />\r\n一方、九州新幹線の熊本と新水俣の間は、新幹線の車両が脱線したままになっていることなどから、運転再開の見通しは立っていないということです。</p>\r\n\r\n<h2 style="font-style:inherit"><strong>乗客「運転再開はうれしい」</strong></h2>\r\n\r\n<p>九州新幹線で熊本に向かうという福岡市の５０歳の女性は、「熊本市で避難生活をしている家族に、生活用品や食事を持っていきます。新幹線が通ったら行こうと思って、ずっと待っていました。自分も役に立ちたかったので、役に立てるのがうれしい」と話していました。<br />\r\nまた、熊本市の６７歳の女性は、「福岡の親戚の家に１週間避難していましたが、熊本の家の様子を見に行ってきます。家に被害はありませんでしたが、部屋がめちゃくちゃになっているので、片付けようと思います。新幹線の運転再開はうれしいです」と話していました。<br />\r\n静岡県の２９歳の男性は、「医療関係の仕事をしていて、１週間働きづめになっている現場の医療スタッフの支援ができればいいと思い、ボランティアに行きます。新幹線が再開することで、熊本に行ける人も多くなると思います。復旧には、長い時間がかかると思いますが、その最初の１歩だと思います」と話していました。</p>\r\n', 'ＪＲ九州は、地震の影響で運転できなくなっていた九州新幹線の博多と熊本の間について、復旧工事が終わり、試験運転で安全が確認されたとして、２３日正午前から、この区間の運転を再開しました。', 1461382259, 1461382259),
(38, '九州新幹線・博多ー熊本 ９日ぶりに運転再開', 'oshibori_white_w70_01_571aec72d6a4b.jpg', '<p>九州新幹線は、今月１４日の地震で回送列車が脱線したほか、防音壁や高架橋などの設備、およそ１５０か所で損傷が見つかり、全線で運転ができなくなりました。<br />\r\n今月２０日に熊本県の新水俣と鹿児島中央の間で運転を再開しましたが、２２日までに博多と熊本の間の復旧工事が終わったことから、ＪＲ九州は、２３日６時からこの区間で試験運転を行いました。<br />\r\nその結果、安全が確認されたとして、９日ぶりに運転を再開することを決め、２３日正午前に博多と熊本からそれぞれ新幹線が出発しました。ただ、一部の区間で徐行運転を行うことから通常５０分程度の所要時間が１時間５分程度かかるほか、本数も大幅に減らして当面は各駅停車のみの運行になるということです。<br />\r\n一方、九州新幹線の熊本と新水俣の間は、新幹線の車両が脱線したままになっていることなどから、運転再開の見通しは立っていないということです。</p>\r\n\r\n<h2 style="font-style:inherit"><strong>乗客「運転再開はうれしい」</strong></h2>\r\n\r\n<p>九州新幹線で熊本に向かうという福岡市の５０歳の女性は、「熊本市で避難生活をしている家族に、生活用品や食事を持っていきます。新幹線が通ったら行こうと思って、ずっと待っていました。自分も役に立ちたかったので、役に立てるのがうれしい」と話していました。<br />\r\nまた、熊本市の６７歳の女性は、「福岡の親戚の家に１週間避難していましたが、熊本の家の様子を見に行ってきます。家に被害はありませんでしたが、部屋がめちゃくちゃになっているので、片付けようと思います。新幹線の運転再開はうれしいです」と話していました。<br />\r\n静岡県の２９歳の男性は、「医療関係の仕事をしていて、１週間働きづめになっている現場の医療スタッフの支援ができればいいと思い、ボランティアに行きます。新幹線が再開することで、熊本に行ける人も多くなると思います。復旧には、長い時間がかかると思いますが、その最初の１歩だと思います」と話していました。</p>\r\n', 'ＪＲ九州は、地震の影響で運転できなくなっていた九州新幹線の博多と熊本の間について、復旧工事が終わり、試験運転で安全が確認されたとして、２３日正午前から、この区間の運転を再開しました。', 1461382259, 1461382259),
(39, '九州新幹線・博多ー熊本 ９日ぶりに運転再開', 'oshibori_white_w70_01_571aec72d6a4b.jpg', '<p>九州新幹線は、今月１４日の地震で回送列車が脱線したほか、防音壁や高架橋などの設備、およそ１５０か所で損傷が見つかり、全線で運転ができなくなりました。<br />\r\n今月２０日に熊本県の新水俣と鹿児島中央の間で運転を再開しましたが、２２日までに博多と熊本の間の復旧工事が終わったことから、ＪＲ九州は、２３日６時からこの区間で試験運転を行いました。<br />\r\nその結果、安全が確認されたとして、９日ぶりに運転を再開することを決め、２３日正午前に博多と熊本からそれぞれ新幹線が出発しました。ただ、一部の区間で徐行運転を行うことから通常５０分程度の所要時間が１時間５分程度かかるほか、本数も大幅に減らして当面は各駅停車のみの運行になるということです。<br />\r\n一方、九州新幹線の熊本と新水俣の間は、新幹線の車両が脱線したままになっていることなどから、運転再開の見通しは立っていないということです。</p>\r\n\r\n<h2 style="font-style:inherit"><strong>乗客「運転再開はうれしい」</strong></h2>\r\n\r\n<p>九州新幹線で熊本に向かうという福岡市の５０歳の女性は、「熊本市で避難生活をしている家族に、生活用品や食事を持っていきます。新幹線が通ったら行こうと思って、ずっと待っていました。自分も役に立ちたかったので、役に立てるのがうれしい」と話していました。<br />\r\nまた、熊本市の６７歳の女性は、「福岡の親戚の家に１週間避難していましたが、熊本の家の様子を見に行ってきます。家に被害はありませんでしたが、部屋がめちゃくちゃになっているので、片付けようと思います。新幹線の運転再開はうれしいです」と話していました。<br />\r\n静岡県の２９歳の男性は、「医療関係の仕事をしていて、１週間働きづめになっている現場の医療スタッフの支援ができればいいと思い、ボランティアに行きます。新幹線が再開することで、熊本に行ける人も多くなると思います。復旧には、長い時間がかかると思いますが、その最初の１歩だと思います」と話していました。</p>\r\n', 'ＪＲ九州は、地震の影響で運転できなくなっていた九州新幹線の博多と熊本の間について、復旧工事が終わり、試験運転で安全が確認されたとして、２３日正午前から、この区間の運転を再開しました。', 1461382259, 1461382259),
(40, '九州新幹線・博多ー熊本 ９日ぶりに運転再開', 'oshibori_white_w70_01_571aec72d6a4b.jpg', '<p>九州新幹線は、今月１４日の地震で回送列車が脱線したほか、防音壁や高架橋などの設備、およそ１５０か所で損傷が見つかり、全線で運転ができなくなりました。<br />\r\n今月２０日に熊本県の新水俣と鹿児島中央の間で運転を再開しましたが、２２日までに博多と熊本の間の復旧工事が終わったことから、ＪＲ九州は、２３日６時からこの区間で試験運転を行いました。<br />\r\nその結果、安全が確認されたとして、９日ぶりに運転を再開することを決め、２３日正午前に博多と熊本からそれぞれ新幹線が出発しました。ただ、一部の区間で徐行運転を行うことから通常５０分程度の所要時間が１時間５分程度かかるほか、本数も大幅に減らして当面は各駅停車のみの運行になるということです。<br />\r\n一方、九州新幹線の熊本と新水俣の間は、新幹線の車両が脱線したままになっていることなどから、運転再開の見通しは立っていないということです。</p>\r\n\r\n<h2 style="font-style:inherit"><strong>乗客「運転再開はうれしい」</strong></h2>\r\n\r\n<p>九州新幹線で熊本に向かうという福岡市の５０歳の女性は、「熊本市で避難生活をしている家族に、生活用品や食事を持っていきます。新幹線が通ったら行こうと思って、ずっと待っていました。自分も役に立ちたかったので、役に立てるのがうれしい」と話していました。<br />\r\nまた、熊本市の６７歳の女性は、「福岡の親戚の家に１週間避難していましたが、熊本の家の様子を見に行ってきます。家に被害はありませんでしたが、部屋がめちゃくちゃになっているので、片付けようと思います。新幹線の運転再開はうれしいです」と話していました。<br />\r\n静岡県の２９歳の男性は、「医療関係の仕事をしていて、１週間働きづめになっている現場の医療スタッフの支援ができればいいと思い、ボランティアに行きます。新幹線が再開することで、熊本に行ける人も多くなると思います。復旧には、長い時間がかかると思いますが、その最初の１歩だと思います」と話していました。</p>\r\n', 'ＪＲ九州は、地震の影響で運転できなくなっていた九州新幹線の博多と熊本の間について、復旧工事が終わり、試験運転で安全が確認されたとして、２３日正午前から、この区間の運転を再開しました。', 1461382259, 1461382259),
(41, '九州新幹線・博多ー熊本 ９日ぶりに運転再開', 'oshibori_white_w70_01_571aec72d6a4b.jpg', '<p>九州新幹線は、今月１４日の地震で回送列車が脱線したほか、防音壁や高架橋などの設備、およそ１５０か所で損傷が見つかり、全線で運転ができなくなりました。<br />\r\n今月２０日に熊本県の新水俣と鹿児島中央の間で運転を再開しましたが、２２日までに博多と熊本の間の復旧工事が終わったことから、ＪＲ九州は、２３日６時からこの区間で試験運転を行いました。<br />\r\nその結果、安全が確認されたとして、９日ぶりに運転を再開することを決め、２３日正午前に博多と熊本からそれぞれ新幹線が出発しました。ただ、一部の区間で徐行運転を行うことから通常５０分程度の所要時間が１時間５分程度かかるほか、本数も大幅に減らして当面は各駅停車のみの運行になるということです。<br />\r\n一方、九州新幹線の熊本と新水俣の間は、新幹線の車両が脱線したままになっていることなどから、運転再開の見通しは立っていないということです。</p>\r\n\r\n<h2 style="font-style:inherit"><strong>乗客「運転再開はうれしい」</strong></h2>\r\n\r\n<p>九州新幹線で熊本に向かうという福岡市の５０歳の女性は、「熊本市で避難生活をしている家族に、生活用品や食事を持っていきます。新幹線が通ったら行こうと思って、ずっと待っていました。自分も役に立ちたかったので、役に立てるのがうれしい」と話していました。<br />\r\nまた、熊本市の６７歳の女性は、「福岡の親戚の家に１週間避難していましたが、熊本の家の様子を見に行ってきます。家に被害はありませんでしたが、部屋がめちゃくちゃになっているので、片付けようと思います。新幹線の運転再開はうれしいです」と話していました。<br />\r\n静岡県の２９歳の男性は、「医療関係の仕事をしていて、１週間働きづめになっている現場の医療スタッフの支援ができればいいと思い、ボランティアに行きます。新幹線が再開することで、熊本に行ける人も多くなると思います。復旧には、長い時間がかかると思いますが、その最初の１歩だと思います」と話していました。</p>\r\n', 'ＪＲ九州は、地震の影響で運転できなくなっていた九州新幹線の博多と熊本の間について、復旧工事が終わり、試験運転で安全が確認されたとして、２３日正午前から、この区間の運転を再開しました。', 1461382259, 1461382259),
(42, '九州新幹線・博多ー熊本 ９日ぶりに運転再開', 'oshibori_white_w70_01_571aec72d6a4b.jpg', '<p>九州新幹線は、今月１４日の地震で回送列車が脱線したほか、防音壁や高架橋などの設備、およそ１５０か所で損傷が見つかり、全線で運転ができなくなりました。<br />\r\n今月２０日に熊本県の新水俣と鹿児島中央の間で運転を再開しましたが、２２日までに博多と熊本の間の復旧工事が終わったことから、ＪＲ九州は、２３日６時からこの区間で試験運転を行いました。<br />\r\nその結果、安全が確認されたとして、９日ぶりに運転を再開することを決め、２３日正午前に博多と熊本からそれぞれ新幹線が出発しました。ただ、一部の区間で徐行運転を行うことから通常５０分程度の所要時間が１時間５分程度かかるほか、本数も大幅に減らして当面は各駅停車のみの運行になるということです。<br />\r\n一方、九州新幹線の熊本と新水俣の間は、新幹線の車両が脱線したままになっていることなどから、運転再開の見通しは立っていないということです。</p>\r\n\r\n<h2 style="font-style:inherit"><strong>乗客「運転再開はうれしい」</strong></h2>\r\n\r\n<p>九州新幹線で熊本に向かうという福岡市の５０歳の女性は、「熊本市で避難生活をしている家族に、生活用品や食事を持っていきます。新幹線が通ったら行こうと思って、ずっと待っていました。自分も役に立ちたかったので、役に立てるのがうれしい」と話していました。<br />\r\nまた、熊本市の６７歳の女性は、「福岡の親戚の家に１週間避難していましたが、熊本の家の様子を見に行ってきます。家に被害はありませんでしたが、部屋がめちゃくちゃになっているので、片付けようと思います。新幹線の運転再開はうれしいです」と話していました。<br />\r\n静岡県の２９歳の男性は、「医療関係の仕事をしていて、１週間働きづめになっている現場の医療スタッフの支援ができればいいと思い、ボランティアに行きます。新幹線が再開することで、熊本に行ける人も多くなると思います。復旧には、長い時間がかかると思いますが、その最初の１歩だと思います」と話していました。</p>\r\n', 'ＪＲ九州は、地震の影響で運転できなくなっていた九州新幹線の博多と熊本の間について、復旧工事が終わり、試験運転で安全が確認されたとして、２３日正午前から、この区間の運転を再開しました。', 1461382259, 1461382259),
(43, '九州新幹線・博多ー熊本 ９日ぶりに運転再開', 'oshibori_white_w70_01_571aec72d6a4b.jpg', '<p>九州新幹線は、今月１４日の地震で回送列車が脱線したほか、防音壁や高架橋などの設備、およそ１５０か所で損傷が見つかり、全線で運転ができなくなりました。<br />\r\n今月２０日に熊本県の新水俣と鹿児島中央の間で運転を再開しましたが、２２日までに博多と熊本の間の復旧工事が終わったことから、ＪＲ九州は、２３日６時からこの区間で試験運転を行いました。<br />\r\nその結果、安全が確認されたとして、９日ぶりに運転を再開することを決め、２３日正午前に博多と熊本からそれぞれ新幹線が出発しました。ただ、一部の区間で徐行運転を行うことから通常５０分程度の所要時間が１時間５分程度かかるほか、本数も大幅に減らして当面は各駅停車のみの運行になるということです。<br />\r\n一方、九州新幹線の熊本と新水俣の間は、新幹線の車両が脱線したままになっていることなどから、運転再開の見通しは立っていないということです。</p>\r\n\r\n<h2 style="font-style:inherit"><strong>乗客「運転再開はうれしい」</strong></h2>\r\n\r\n<p>九州新幹線で熊本に向かうという福岡市の５０歳の女性は、「熊本市で避難生活をしている家族に、生活用品や食事を持っていきます。新幹線が通ったら行こうと思って、ずっと待っていました。自分も役に立ちたかったので、役に立てるのがうれしい」と話していました。<br />\r\nまた、熊本市の６７歳の女性は、「福岡の親戚の家に１週間避難していましたが、熊本の家の様子を見に行ってきます。家に被害はありませんでしたが、部屋がめちゃくちゃになっているので、片付けようと思います。新幹線の運転再開はうれしいです」と話していました。<br />\r\n静岡県の２９歳の男性は、「医療関係の仕事をしていて、１週間働きづめになっている現場の医療スタッフの支援ができればいいと思い、ボランティアに行きます。新幹線が再開することで、熊本に行ける人も多くなると思います。復旧には、長い時間がかかると思いますが、その最初の１歩だと思います」と話していました。</p>\r\n', 'ＪＲ九州は、地震の影響で運転できなくなっていた九州新幹線の博多と熊本の間について、復旧工事が終わり、試験運転で安全が確認されたとして、２３日正午前から、この区間の運転を再開しました。', 1461382259, 1461382259),
(44, '避難生活の負担などで死亡１２人に', 'oshibori_brown_w80_01_571aec87c9051.jpg', '<p><span style="font-family:ヒラギノ角ゴ pron w3,hiragino kaku gothic pron,メイリオ,meiryo,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:16.002px">熊本県災害対策本部は、今月１６日の地震で倒壊した自宅の下敷きになり、５日後の２１日、搬送先の病院で死亡した南阿蘇村の６９歳の女性について、体への負担など一連の地震の影響で亡くなったと思われるケースにあたると発表しました。一連の地震で、避難生活による体への負担や病気などによって亡くなったと思われる人は、これで、５つの市町村で１２人になりました。</span></p>\r\n', '熊本県災害対策本部は、今月１６日の地震で倒壊した自宅の下敷きになり、５日後の２１日、搬送先の病院で死亡した南阿蘇村の６９歳の女性について、体への負担など一連の地震の影響で亡くなったと思われるケースにあたると発表しました。一連の地震で、避難生活による体への負担や病気などによって亡くなったと思われる人は、これで、５つの市町村で１２人になりました。', 1461382279, 1461382279),
(45, '避難生活の負担などで死亡１２人に', 'oshibori_brown_w80_01_571aec87c9051.jpg', '<p><span style="font-family:ヒラギノ角ゴ pron w3,hiragino kaku gothic pron,メイリオ,meiryo,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:16.002px">熊本県災害対策本部は、今月１６日の地震で倒壊した自宅の下敷きになり、５日後の２１日、搬送先の病院で死亡した南阿蘇村の６９歳の女性について、体への負担など一連の地震の影響で亡くなったと思われるケースにあたると発表しました。一連の地震で、避難生活による体への負担や病気などによって亡くなったと思われる人は、これで、５つの市町村で１２人になりました。</span></p>\r\n', '熊本県災害対策本部は、今月１６日の地震で倒壊した自宅の下敷きになり、５日後の２１日、搬送先の病院で死亡した南阿蘇村の６９歳の女性について、体への負担など一連の地震の影響で亡くなったと思われるケースにあたると発表しました。一連の地震で、避難生活による体への負担や病気などによって亡くなったと思われる人は、これで、５つの市町村で１２人になりました。', 1461382279, 1461382279),
(46, 'Ｇ７農相会合 会場周辺で警戒続く 新潟', 'oshibori_brown_w80_01_571aedd4e4606.jpg', '<p><span style="font-family:ヒラギノ角ゴ pron w3,hiragino kaku gothic pron,メイリオ,meiryo,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:16.002px">Ｇ７＝主要７か国の農相会合は２３日と２４日、新潟市で開かれ、「伊勢志摩サミット」に合わせて行われる閣僚会合では、広島市での外相会合に続く２番目の開催となります。</span><br />\r\n<span style="font-family:ヒラギノ角ゴ pron w3,hiragino kaku gothic pron,メイリオ,meiryo,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:16.002px">会場となる新潟市中央区の複合施設「朱鷺メッセ」では施設に通じるおよそ１キロの道路でテロなどを防ごうと警察による検問が行われています。</span><br />\r\n<span style="font-family:ヒラギノ角ゴ pron w3,hiragino kaku gothic pron,メイリオ,meiryo,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:16.002px">警察官は道路を通る車を停車させて、ドライバーに免許証の提示を求め、鏡のついた棒を使って車両の底の部分を見たり、トランクを開けたりして、不審物がないか確認していました。</span><br />\r\n<span style="font-family:ヒラギノ角ゴ pron w3,hiragino kaku gothic pron,メイリオ,meiryo,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:16.002px">会合が始まるのは午後からで、警察による警戒は施設の中でも行われているほか、会場脇の信濃川でも海上保安本部による警戒が続いています。</span></p>\r\n', '来月、三重県で行われる「伊勢志摩サミット」に合わせて行われる閣僚会合の１つ、Ｇ７＝主要７か国の農相会合が午後から新潟市で始まります。会場の周辺ではテロなどを防ごうと車両の検問が行われるなど警戒が続いています。', 1461382613, 1461382303),
(47, 'Ｇ７農相会合 会場周辺で警戒続く 新潟', 'oshibori_brown_w80_01_571aedd4e4606.jpg', '<p><span style="font-family:ヒラギノ角ゴ pron w3,hiragino kaku gothic pron,メイリオ,meiryo,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:16.002px">Ｇ７＝主要７か国の農相会合は２３日と２４日、新潟市で開かれ、「伊勢志摩サミット」に合わせて行われる閣僚会合では、広島市での外相会合に続く２番目の開催となります。</span><br />\r\n<span style="font-family:ヒラギノ角ゴ pron w3,hiragino kaku gothic pron,メイリオ,meiryo,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:16.002px">会場となる新潟市中央区の複合施設「朱鷺メッセ」では施設に通じるおよそ１キロの道路でテロなどを防ごうと警察による検問が行われています。</span><br />\r\n<span style="font-family:ヒラギノ角ゴ pron w3,hiragino kaku gothic pron,メイリオ,meiryo,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:16.002px">警察官は道路を通る車を停車させて、ドライバーに免許証の提示を求め、鏡のついた棒を使って車両の底の部分を見たり、トランクを開けたりして、不審物がないか確認していました。</span><br />\r\n<span style="font-family:ヒラギノ角ゴ pron w3,hiragino kaku gothic pron,メイリオ,meiryo,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:16.002px">会合が始まるのは午後からで、警察による警戒は施設の中でも行われているほか、会場脇の信濃川でも海上保安本部による警戒が続いています。</span></p>\r\n', '来月、三重県で行われる「伊勢志摩サミット」に合わせて行われる閣僚会合の１つ、Ｇ７＝主要７か国の農相会合が午後から新潟市で始まります。会場の周辺ではテロなどを防ごうと車両の検問が行われるなど警戒が続いています。', 1461382613, 1461382303);

-- --------------------------------------------------------

--
-- Table structure for table `news1`
--

CREATE TABLE IF NOT EXISTS `news1` (
  `id` int(11) NOT NULL,
  `category` tinyint(4) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text,
  `update_timestamp` int(11) NOT NULL,
  `create_timestamp` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news1`
--

INSERT INTO `news1` (`id`, `category`, `title`, `body`, `update_timestamp`, `create_timestamp`) VALUES
(6, 1, 'Giới thiệu 1', '<p>Giới thiệu 1</p>\r\n', 1438957287, 1438957287),
(7, 1, 'Giới thiệu 2', '<p><span style="color:#A52A2A">Giới thiệu 2</span></p>\r\n', 1438957446, 1438957446),
(8, 2, 'Chính sách 1', '<p><span style="color:#FF0000">Ch&iacute;nh s&aacute;ch 1</span></p>\r\n', 1439604070, 1438957468),
(9, 4, 'Sửa màn hình Laptop.', '<p><strong>Sửa m&agrave;n h&igrave;nh Laptop</strong>.</p>\r\n\r\n<p>Trong thời buổi c&ocirc;ng nghệ ph&aacute;t triển hiện nay, việc sở hữu Laptop hay điện thoại Smartphone l&agrave; rất cần thiết.</p>\r\n\r\n<p>Đ&acirc;y cũng l&agrave; hai thiết bị c&ocirc;ng nghệ được đ&oacute;ng g&oacute;i một c&aacute;ch hết sức kỹ lưỡng, c&aacute;c th&agrave;nh phần đồng nhất v&agrave; kh&oacute; t&aacute;ch rời.</p>\r\n\r\n<p>Đối với cả hai thiết bị n&agrave;y, th&agrave;nh phần tương t&aacute;c với người sử dụng nhiều nhất đ&oacute; ch&iacute;nh l&agrave; M&agrave;n h&igrave;nh Laptop hay Smartphone.</p>\r\n\r\n<p>Đ&aacute;ng tiếc rằng đ&acirc;y l&agrave; linh kiện thường xảy ra lỗi, g&acirc;y rất nhiều kh&oacute; khăn cho người d&ugrave;ng trong qu&aacute; tr&igrave;nh sử dụng đặc biệt l&agrave; <a href="http://4tech.vn/linh-kien/man-hinh-laptop.html">m&agrave;n h&igrave;nh laptop</a>.</p>\r\n\r\n<p>Nếu như trước kia, việc thay thế, sửa chữa m&agrave;n h&igrave;nh Laptop gặp nhiều kh&oacute; khăn v&agrave; đắt đỏ do thiếu linh kiện sửa chữa th&igrave; hiện nay việc sửa chữa m&agrave;n h&igrave;nh laptop trở n&ecirc;n đơn giản v&agrave; rẻ hơn rất nhiều.</p>\r\n\r\n<p>C&oacute; rất nhiều nguy&ecirc;n nh&acirc;n dẫn đến việc m&agrave;n h&igrave;nh laptop của bạn bị lỗi, chi tiết c&aacute;c lỗi thường gặp, c&aacute;ch nhận biết c&aacute;c bạn c&oacute; thể xem tại đ&acirc;y. <a href="http://4tech.vn/man-hinh-laptop-nhung-dieu-can-biet.html">M&agrave;n h&igrave;nh laptop &ndash; Những điều cần biết</a>.</p>\r\n\r\n<p>Đối với đa số người d&ugrave;ng hiện nay việc đ&aacute;nh gi&aacute; t&igrave;nh trạng m&agrave;n h&igrave;nh laptop của m&igrave;nh thường gặp nhiều kh&oacute; khăn, nếu như c&oacute; bất cứ thắc mắc n&agrave;o qu&yacute; kh&aacute;ch c&oacute; thể gọi ngay cho ch&uacute;ng t&ocirc;i th&ocirc;ng qua số hotline 04.2262.9999 để được tư vấn.</p>\r\n\r\n<p>4Tech kinh doanh trong ng&agrave;nh dịch vụ m&aacute;y t&iacute;nh được 8 năm li&ecirc;n tục, tự h&agrave;o l&agrave; doanh nghệp lọt v&agrave;o top 100 doanh nghiệp sản phẩm dịch vụ h&agrave;ng đầu việt nam năm 2014. Xin gửi tới qu&yacute; kh&aacute;ch h&agrave;ng b&aacute;o gi&aacute; chi tiết <strong>sửa chữa m&agrave;n h&igrave;nh Laptop</strong> tại Cty 4Tech.</p>\r\n\r\n<p>Qu&yacute; kh&aacute;ch lưu &yacute;, 4Tech &aacute;p dụng gi&aacute; sửa m&agrave;n h&igrave;nh laptop bằng nhau cho tất cả c&aacute;c thương hiệu Laptop như m&agrave;n h&igrave;nh laptop Acer, Sony, m&agrave;n h&igrave;nh laptop Dell, Asus, m&agrave;n h&igrave;nh laptop Lenovo, HP&hellip; đều &aacute;p dụng chung mức gi&aacute; như tr&ecirc;n.</p>\r\n\r\n<p>Tr&ecirc;n thị trường c&aacute;c đơn vị sửa chữa thường sẽ t&aacute;ch ri&ecirc;ng gi&aacute; sửa t&ugrave;y v&agrave;o gi&aacute; th&agrave;nh hay thương hiệu của Sản Phẩm m&agrave; kh&aacute;ch h&agrave;ng sử dụng.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<table border="1" cellspacing="0" style="width:800px">\r\n	<caption>&nbsp;</caption>\r\n	<tbody>\r\n		<tr>\r\n			<td colspan="4" style="text-align:center">\r\n			<p><strong>&nbsp;B&aacute;o gi&aacute; dịch vụ sửa chữa m&agrave;n h&igrave;nh laptop</strong></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="text-align:center">\r\n			<p><strong>STT</strong></p>\r\n			</td>\r\n			<td style="text-align:center">\r\n			<p><strong>T&igrave;nh trạng</strong></p>\r\n			</td>\r\n			<td style="text-align:center">\r\n			<p><strong>Gi&aacute;(Vnd)</strong></p>\r\n			</td>\r\n			<td style="text-align:center">\r\n			<p><strong>Bảo h&agrave;nh</strong></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="text-align:center">\r\n			<p>1</p>\r\n			</td>\r\n			<td style="text-align:center">\r\n			<p>Sửa cao &aacute;p, chế cao &aacute;p</p>\r\n			</td>\r\n			<td style="text-align:center">\r\n			<p>220.000</p>\r\n			</td>\r\n			<td style="text-align:center">\r\n			<p>3 th&aacute;ng</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="text-align:center">\r\n			<p>2</p>\r\n			</td>\r\n			<td style="text-align:center">\r\n			<p>Chế c&aacute;p, h&agrave;n c&aacute;p</p>\r\n			</td>\r\n			<td style="text-align:center">\r\n			<p>180.000</p>\r\n			</td>\r\n			<td style="text-align:center">\r\n			<p>3 th&aacute;ng</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="text-align:center">\r\n			<p>3</p>\r\n			</td>\r\n			<td style="text-align:center">\r\n			<p>M&agrave;n h&igrave;nh trắng, nh&ograve;e, nhiễu, m&agrave;n mưa</p>\r\n			</td>\r\n			<td style="text-align:center">\r\n			<p>180.000</p>\r\n			</td>\r\n			<td style="text-align:center">\r\n			<p>3 th&aacute;ng</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="text-align:center">\r\n			<p>4</p>\r\n			</td>\r\n			<td style="text-align:center">\r\n			<p>L&agrave;m hết c&aacute;c vết ố, đốm mờ do lỗi ma trận</p>\r\n			</td>\r\n			<td style="text-align:center">\r\n			<p>240.000</p>\r\n			</td>\r\n			<td style="text-align:center">\r\n			<p>3 th&aacute;ng</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="text-align:center">\r\n			<p>5</p>\r\n			</td>\r\n			<td style="text-align:center">\r\n			<p>L&agrave;m hết c&aacute;c vết xước</p>\r\n			</td>\r\n			<td style="text-align:center">\r\n			<p>260.000</p>\r\n			</td>\r\n			<td style="text-align:center">\r\n			<p>3 th&aacute;ng</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="text-align:center">\r\n			<p>6</p>\r\n			</td>\r\n			<td style="text-align:center">\r\n			<p>Bản lề m&agrave;n h&igrave;nh(gập l&ecirc;n xuống cứng, hoặc g&atilde;y)</p>\r\n			</td>\r\n			<td style="text-align:center">\r\n			<p>180.000-400.000( sửa chữa hoặc thay thế)</p>\r\n			</td>\r\n			<td style="text-align:center">\r\n			<p>3 th&aacute;ng</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="text-align:center">\r\n			<p>7</p>\r\n			</td>\r\n			<td style="text-align:center">\r\n			<p>Thay b&oacute;ng tu&yacute;p LCD</p>\r\n\r\n			<p>(+ 12&quot;, 13.3&quot;, 14&quot;, 15.4&quot;, 17&quot; wide)</p>\r\n			</td>\r\n			<td style="text-align:center">\r\n			<p>160.000</p>\r\n			</td>\r\n			<td style="text-align:center">\r\n			<p>3 th&aacute;ng</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>B&aacute;o gi&aacute; ph&iacute;a tr&ecirc;n ch&uacute;ng t&ocirc;i liệt k&ecirc; những bệnh cơ bản v&agrave; thường gặp nhất tr&ecirc;n m&agrave;n h&igrave;nh Laptop một số trường hợp đặc biệt sẽ được 4Tech th&ocirc;ng b&aacute;o v&agrave; giải th&iacute;ch kỹ c&agrave;ng cho kh&aacute;ch h&agrave;ng.</p>\r\n\r\n<p>Khi mang sản phẩm tới Cty c&aacute;c bạn sẽ được tư vấn chi tiết hướng khắc phục, như đ&atilde; n&oacute;i ở tr&ecirc;n, chi ph&iacute; <a href="http://4tech.vn/thay-man-hinh-laptop.html">thay m&agrave;n h&igrave;nh laptop</a>&nbsp;đ&atilde; trở n&ecirc;n rẻ rất nhiều, n&ecirc;n việc lựa chọn sửa chữa hay thay thế sẽ được 4Tech c&acirc;n nhắc kỹ lưỡng gi&uacute;p đưa ra cho qu&yacute; kh&aacute;ch một giải ph&aacute;p tối ưu nhất.</p>\r\n\r\n<p>R&aacute;t vui được phục vụ qu&yacute; kh&aacute;ch, dịch vụ, gi&aacute; th&agrave;nh, hỗ trợ sau b&aacute;n h&agrave;ng chắc chắn sẽ l&agrave;m qu&yacute; kh&aacute;ch h&agrave;i l&ograve;ng.</p>\r\n\r\n<p><span style="color:#ff0000"><em>Đặc biệt ch&uacute;ng t&ocirc;i &aacute;p dụng ch&iacute;nh s&aacute;ch giao nhận tại nh&agrave; miễn ph&iacute; đối với tất cả kh&aacute;ch h&agrave;ng tại nội th&agrave;nh H&agrave; Nội.</em></span></p>\r\n', 1439995244, 1439995244);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(10) unsigned NOT NULL,
  `cid` int(10) unsigned NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `description` text,
  `weight` varchar(255) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `image` text NOT NULL,
  `create_timestamp` int(11) DEFAULT NULL,
  `update_timestamp` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `flg` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `cid`, `product_name`, `description`, `weight`, `size`, `color`, `price`, `image`, `create_timestamp`, `update_timestamp`, `status`, `flg`) VALUES
(12, 12, 'test', '<p>testtest</p>\r\n', 'test', 'test', 'test', 20, '["5711040627005.jpg","5711040861235.jpg","57110409cadef.jpg","5711040b670a2.jpg"]', 1460732940, 1460732940, 1, 1),
(13, 14, 'test222222', '<p>test2222222</p>\r\n', 'test2', 'test2', 'test2', 10, '["57110a5149b4d.jpg","57110a517c009.jpg","57110a51ad13c.jpg","57110a51f170c.jpg"]', 1460732966, 1460734621, 1, 1),
(14, 11, 'asd', '<p>sasd</p>\r\n', 'asd', 'fsd', 'fsdf', 123, '["57179f67a9b72.jpg","57179f67e3948.jpg","57179f6820453.jpg","57179f6864253.jpg"]', 1461165738, 1461165929, 1, 1),
(15, 11, 'test 2', '<p>zczxczxc</p>\r\n', 'as', 'sda', 'asd', 2147483647, '["57179f5fe1c26.jpg","57179f6025493.jpg","57179f60569ae.jpg","57179f609bf1f.jpg"]', 1461165757, 1461165921, 1, 1),
(16, 12, 'マイクロファイバータオル', '<p>マイクロファイバータオルマイクロファイバータオルマイクロファイバータオルマイクロファイバータオルマイクロファイバータオルマイクロファイバータオルマイクロファイバータオルマイクロファイバータオルマイクロファイバータオルマイクロファイバータオルマイクロファイバータオルマイクロファイバータオルマイクロファイバータオルマイクロファイバータオルマイクロファイバータオルマイクロファイバータオルマイクロファイバータオルマイクロファイバータオルマイクロファイバータオルマイクロファイバータオルマイクロファイバータオルマイクロファイバータオルマイクロファイバータオルマイクロファイバータオルマイクロファイバータオルマイクロファイバータオルマイクロファイバータオルマイクロファイバータオルマイクロファイバータオルマイクロファイバータオルマイクロファイバータオルマイクロファイバータオルマイクロファイバータオルマイクロファイバータオルマイクロファイバータオルマイクロファイバータオルマイクロファイバータオルマイクロファイバータオルマイクロファイバータオルマイクロファイバータオルマイクロファイバータオルマイクロファイバータオルマイクロファイバータオルマイクロファイバータオルマイクロファイバータオルマイクロファイバータオルマイクロファイバータオルマイクロファイバータオルマイクロファイバータオルマイクロファイバータオルマイクロファイバータオルマイクロファイバータオルマイクロファイバータオルマイクロファイバータオルマイクロファイバータオルマイクロファイバータオルマイクロファイバータオルマイクロファイバータオルマイクロファイバータオルマイクロファイバータオルマイクロファイバータオルマイクロファイバータオルマイクロファイバータオルマイクロファイバータオルマイクロファイバータオルv</p>\r\n', 'マイクロファイバータオル', 'マイクロファイバータオル', 'マイクロファイバータオル', 12121212, '["5718e4f758153.jpg","5718e4f78cd20.jpg","5718e4f7bb743.jpg","5718e4f80d243.jpg"]', 1461166149, 1461249273, 1, 1),
(17, 11, 'ベトナム製200匁総パイル白タオル 25ダース', '<p><strong><span style="font-family:ヒラギノ角ゴ pro w3,hiragino kaku gothic pro,メイリオ,meiryo,osaka,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:12px">タオルの標準的な重さとされているのが、<span style="color:#FF0000">200</span>匁のタオルです。</span><br />\r\n<span style="font-family:ヒラギノ角ゴ pro w3,hiragino kaku gothic pro,メイリオ,meiryo,osaka,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:12px">様々な業種でご活用いただける万能な業務用タオルですので、ぜひ御社の業務にお役立てください。</span><br />\r\n<br />\r\n<span style="font-family:ヒラギノ角ゴ pro w3,hiragino kaku gothic pro,メイリオ,meiryo,osaka,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:12px">中国製タオルに比べると厚みが薄いです。</span></strong></p>\r\n', '20g', '12mm', 'Color', 111, '["5718eb777e36c.jpg","5718eb77ac9a6.jpg","5718eb77d9489.jpg","5718eb7829fe9.jpg"]', 1461250937, 1461250937, 1, 1),
(18, 11, 'ベトナム製200匁総パイル白タオル 25ダース', '<p><span style="font-family:ヒラギノ角ゴ pro w3,hiragino kaku gothic pro,メイリオ,meiryo,osaka,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:12px">タオルの標準的な重さとされているのが、200匁のタオルです。</span><br />\r\n<span style="font-family:ヒラギノ角ゴ pro w3,hiragino kaku gothic pro,メイリオ,meiryo,osaka,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:12px">様々な業種でご活用いただける万能な業務用タオルですので、ぜひ御社の業務にお役立てください。</span><br />\r\n<br />\r\n<span style="font-family:ヒラギノ角ゴ pro w3,hiragino kaku gothic pro,メイリオ,meiryo,osaka,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:12px">中国製タオルに比べると厚みが薄いです。</span></p>\r\n', '43', '3434', '343', 4343434, '["5718eb918c7e6.jpg","5718eb93db23b.jpg","5718eb9768afd.jpg"]', 1461250968, 1461250968, 1, 1),
(19, 11, 'ベトナム製200匁総パイル白タオル 25ダース', '<p><span style="font-family:ヒラギノ角ゴ pro w3,hiragino kaku gothic pro,メイリオ,meiryo,osaka,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:12px">タオルの標準的な重さとされているのが、200匁のタオルです。</span><br />\r\n<span style="font-family:ヒラギノ角ゴ pro w3,hiragino kaku gothic pro,メイリオ,meiryo,osaka,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:12px">様々な業種でご活用いただける万能な業務用タオルですので、ぜひ御社の業務にお役立てください。</span><br />\r\n<br />\r\n<span style="font-family:ヒラギノ角ゴ pro w3,hiragino kaku gothic pro,メイリオ,meiryo,osaka,ｍｓ ｐゴシック,ms pgothic,sans-serif; font-size:12px">中国製タオルに比べると厚みが薄いです。</span></p>\r\n', '4334234', '234234', '234', 234, '["5718ebc1d3b98.jpg","5718ebc479eaf.jpg","5718ebc4a7d19.jpg","5718ebc4d4fcc.jpg","5718ebc520d0b.jpg"]', 1461251014, 1461251014, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `slide`
--

CREATE TABLE IF NOT EXISTS `slide` (
  `id` int(11) NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT '1',
  `title` varchar(255) NOT NULL DEFAULT '0',
  `image` varchar(255) NOT NULL DEFAULT '0',
  `url` varchar(255) DEFAULT '0',
  `update_timestamp` int(11) NOT NULL DEFAULT '0',
  `create_timestamp` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `slide`
--

INSERT INTO `slide` (`id`, `type`, `title`, `image`, `url`, `update_timestamp`, `create_timestamp`) VALUES
(9, 1, 'Ｇ７農相会合 会場周辺で警戒続く 新潟', 'main01_571afd1bd52a3.png', 'http://google.com.vn', 1461386998, 1461386523);

-- --------------------------------------------------------

--
-- Table structure for table `system`
--

CREATE TABLE IF NOT EXISTS `system` (
  `id` int(11) NOT NULL DEFAULT '1',
  `company` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `system`
--

INSERT INTO `system` (`id`, `company`, `address`, `email`, `phone`) VALUES
(1, 'Company name1', 'Address4', 'Email3', 'TEL2');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `update_timestamp` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `update_timestamp`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'chatdm@gmail.com', 1439017263);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `image_tmp`
--
ALTER TABLE `image_tmp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `create_timestamp` (`create_timestamp`);

--
-- Indexes for table `news1`
--
ALTER TABLE `news1`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `create_timestamp` (`create_timestamp`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `create_timestamp` (`create_timestamp`);

--
-- Indexes for table `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system`
--
ALTER TABLE `system`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `image_tmp`
--
ALTER TABLE `image_tmp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `news1`
--
ALTER TABLE `news1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `slide`
--
ALTER TABLE `slide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
