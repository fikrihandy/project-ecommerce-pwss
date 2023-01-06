-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 26, 2022 at 04:21 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fikri_ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `produk` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `deskripsi` varchar(500) NOT NULL,
  `stok` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `kategori` varchar(10) NOT NULL,
  `gambar` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`produk`, `harga`, `deskripsi`, `stok`, `id`, `kategori`, `gambar`) VALUES
('MacBook Air M1 256GB', 16000000, 'Laptop Apple yang paling tipis dan ringan, bertenaga super dengan chip Apple M1. Tuntaskan berbagai proyek Anda dengan CPU 8-core super cepat. Tingkatkan aplikasi dan game kaya grafis ke level lebih tinggi dengan GPU hingga 8-core. Dan percepat tugas pembelajaran mesin dengan Neural Engine 16-core.', 27, 1, 'Laptop', '1.jpeg'),
('Redmi Note 10 5G 8/128', 2900000, 'MediaTek Dimensity 700 dibuat menggunakan proses level unggulan 7 nm. Dilengkapi dengan CPU octa-core dengan kecepatan clock hingga 2,2 GHz, dan ARM Mali G57 GPU yang bertenaga. Prosesor ini memastikan pengoperasian yang lancar dan memberi pengalaman pengguna yang sempurna.', 20, 3, 'Smartphone', '3.jpeg'),
('Sades Khanda TKL', 350000, 'Sades Khanda is a Tenkeyless Mechanical (TKL) Outemu Removable Switch Gaming Keyboard (87 Keys) that already have RGB Illumination Lightning, ABS Double Injection Keycaps, and All-Keys Anti Ghosting.', 71, 42, 'Aksesoris', '639c36801c9f1 - Sades Khanda.jpg'),
('MSI Titan GT77 - 12U', 76999000, 'Menggabungkan pengalaman mewah, teknologi inovatif, dan performa ekstrem, Titan GT77 adalah puncak permainan. Hadir dengan prosesor hingga Intel® Core™ i9-12900HX generasi ke-12 terbaru beperforma tinggi dan kartu grafis NVIDIA® GeForce RTX™ 30 Series, serta estetika mewah Mystic Light Bar, Titan GT77 menonjolkan performa dan desain terbaik. Titan GT77 telah lahir kembali.', 2, 44, 'Laptop', '639e0119c1b00 - 0411uW69RjY2cWYs5m8g74g-1..v1657898406.jpg'),
('MacBook Pro M2 256GB', 20999000, 'MacBook Pro 13 inci lebih andal dari sebelumnya. Bertenaga super berkat chip M2 generasi berikutnya, MacBook Pro ini merupakan laptop pro Apple yang paling portabel, dengan kekuatan baterai hingga 20 jam.', 4, 45, 'Laptop', '639d242ca19d5 - 0607_123345_0a3a_inilah.com_.jpg'),
('Logitech G335 7.1 Headset', 819000, 'At only 240gr, the Logitech G335 Wired Gaming Headset is lightweight and comfortable. It uses a suspension design with an adjustable elastic headband for a customized fit. Along with memory foam earpads, the G335 provides long lasting comfort. ', 64, 46, 'Aksesoris', '639d25b45b563 - Screen Shot 2022-12-17 at 09.12.02.png'),
('Redmi 5A', 1000000, 'Redmi 5A memiliki body ringan, baterai tahan lama, dan slot khusus untuk kartu microSD. Layar HD 5\" (12,7cm) dan kamera resolusi tinggi 13MP memungkinkan kamu untuk mengabadikan momen-momen tak terlupakan dalam hidupmu. MIUI 9 dan prosesor Qualcomm Snapdragon 425 memastikan Redmi 5A dapat dengan mudah menangani tugas sehari-hari, seperti nonton video, main game, dll. Redmi 5A cepat dan lancar. Smartphone untuk setiap orang!', 2, 48, 'Smartphone', '639e0329c372b - redmi 5a.jpeg'),
('dbE GM150', 149000, 'dbE Acoustics GM150 adalah entry level 3.5mm gaming headphone dari dbE. Didesain dengan menggunakan \"wing system\" dan pad kulit PU yang berkualitas sehingga nyaman digunakan dalam waktu lama. Kenyamanan penggunaan merupakan salah satu prioritas utama kami dalam mendesain produk.', 5, 50, 'Aksesoris', '639e60785ac11 - GM150 GM180.png.webp'),
('Oryx Pro Pop!_OS', 13500000, 'The most versatile hybrid graphics laptop. We squeezed a powerful H-class Intel CPU, NVIDIA RTX 30-Series graphics, and up to 64GB of DDR4 or DDR5 RAM into an impressively thin laptop body. What amazing innovations will you squeeze out of it?', 16, 51, 'Laptop', '639e66ec3dea9 - oryx pro.png'),
('Realme Narzo 30A', 1650000, 'Realme Narzo 30A didukung dengan prosesor Gaming Helio G85 octa-core 12nm, memastikan smartphone dapat selalu mendukung seluruh aktifitas. Menjadikan pengalaman bermain game lebih lancar dan maksimal.', 42, 52, 'Smartphone', '639e6795c7a3e - Screen Shot 2022-12-18 at 08.06.16.png'),
('F710 Wireless Gamepad', 765000000, 'D-pad empat switch untuk kontrol yang akurat. 2.4 GHz wireless yang cepat via nano reciever USB. Dual-motor vibration feedback. Kompatibel dengan PC.', 27, 53, 'Aksesoris', '639e68b5d7038 - 20191003_204340-min.jpeg'),
('Koodo Solar 75%', 850000, 'Seri Mechanical Keyboard terbaru di tahun 2022 dari Koodo. Dengan Layout 75% dan dilengkapi Rotary Knob dilapisi warna emas membuat Mechanical Keyboard Solar tampak klasik namun tetep memiliki fitur modern . Koodo Solar juga di desain dengan Keycaps bertema Planetary yang unik sehingga membuat desain Solar Mechanical Keyboard ini One of a Kind banget.', 19, 54, 'Aksesoris', '63a3b93a2e6ef - solar.webp'),
('ROG Phone 6', 11000000, 'Legenda telah berevolusi! ROG Phone 6 adalah inkarnasi terbaru dari ponsel gaming yang akan mengalahkan dunia. Memanfaatkan kekuatan dari Platform Seluler Qualcomm® Snapdragon® 8+ Gen 1 terbaru, dan dengan sistem termal GameCool 6 terbaru dikelasnya yang memungkinkan Anda menghancurkan setiap penghalang dan menembus setiap batas, serta layar 165 Hz untuk pengalaman visual yang revolusioner.', 20, 56, 'Smartphone', '63a9b02cb8d42 - Screen Shot 2022-12-26 at 18.32.52.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
