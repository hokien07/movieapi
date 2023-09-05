@extends('layouts.app')
@section('content')
    <div class="postbody">
        <div class="bixbox bixboxarc bbnofrm">
            <div class="releases">
                <h1><span>{{$name}}</span></h1>
            </div>
            <div class="mrgn">
                <div class="advancedsearch">
                    <div class="quickfilter">
                        <form action="/" class="filters " method="GET">
                            <div class="filter dropdown">
                                <button type="button" class="dropdown-toggle" data-toggle="dropdown"> Sắp xếp
                                    <span id="filtercount">Thời gian đăng</span> <i class="fa fa-angle-down"
                                                                                    aria-hidden="true"></i></button>
                                <ul class="dropdown-menu c4">
                                    <li>
                                        <input type="radio" id="sort-update" name="filter[sort]" value="update"
                                        >
                                        <label for="sort-update">Thời gian cập nhật</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="sort-create" name="filter[sort]" value="create"
                                        >
                                        <label for="sort-create">Thời gian đăng</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="sort-year" name="filter[sort]" value="year"
                                        >
                                        <label for="sort-year">Năm sản xuất</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="sort-view" name="filter[sort]" value="view"
                                        >
                                        <label for="sort-view">Lượt xem</label>
                                    </li>
                                </ul>
                            </div>

                            <div class="filter dropdown">
                                <button type="button" class="dropdown-toggle" data-toggle="dropdown"> Định dạng
                                    <span id="filtercount">Toàn bộ</span> <i class="fa fa-angle-down"
                                                                             aria-hidden="true"></i></button>
                                <ul class="dropdown-menu c4">
                                    <li>
                                        <input type="radio" id="type-all" name="filter[type]" value=""
                                               checked>
                                        <label for="type-all">Toàn bộ</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="type-series" name="filter[type]" value="series"
                                        >
                                        <label for="type-series">Phim bộ</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="type-single" name="filter[type]" value="single"
                                        >
                                        <label for="type-single">Phim lẻ</label>
                                    </li>
                                </ul>
                            </div>

                            <div class="filter dropdown">
                                <button type="button" class="dropdown-toggle" data-toggle="dropdown"> Thể loại
                                    <span id="filtercount">Toàn bộ</span> <i class="fa fa-angle-down"
                                                                             aria-hidden="true"></i></button>
                                <ul class="dropdown-menu c4">
                                    <li>
                                        <input type="radio" id="category-all" name="filter[category]" value=""
                                               checked>
                                        <label for="category-all">Toàn bộ</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="category-20" name="filter[category]"
                                               value="20">
                                        <label for="category-20">Âm Nhạc</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="category-12" name="filter[category]"
                                               value="12">
                                        <label for="category-12">Bí ẩn</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="category-19" name="filter[category]"
                                               value="19">
                                        <label for="category-19">Chiến Tranh</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="category-11" name="filter[category]"
                                               value="11">
                                        <label for="category-11">Chính kịch</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="category-1" name="filter[category]"
                                               value="1">
                                        <label for="category-1">Cổ Trang</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="category-16" name="filter[category]"
                                               value="16">
                                        <label for="category-16">Gia Đình</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="category-9" name="filter[category]"
                                               value="9" checked>
                                        <label for="category-9">Hài Hước</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="category-4" name="filter[category]"
                                               value="4">
                                        <label for="category-4">Hành Động</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="category-10" name="filter[category]"
                                               value="10">
                                        <label for="category-10">Hình Sự</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="category-6" name="filter[category]"
                                               value="6">
                                        <label for="category-6">Hoạt Hình</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="category-21" name="filter[category]"
                                               value="21">
                                        <label for="category-21">Học Đường</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="category-17" name="filter[category]"
                                               value="17">
                                        <label for="category-17">Khoa Học</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="category-15" name="filter[category]"
                                               value="15">
                                        <label for="category-15">Kinh Dị</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="category-24" name="filter[category]"
                                               value="24">
                                        <label for="category-24">Kinh Điển</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="category-7" name="filter[category]"
                                               value="7">
                                        <label for="category-7">Phiêu Lưu</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="category-3" name="filter[category]"
                                               value="3">
                                        <label for="category-3">Phim 18+</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="category-13" name="filter[category]"
                                               value="13">
                                        <label for="category-13">Tài Liệu</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="category-2" name="filter[category]"
                                               value="2">
                                        <label for="category-2">Tâm Lý</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="category-23" name="filter[category]"
                                               value="23">
                                        <label for="category-23">Thần Thoại</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="category-22" name="filter[category]"
                                               value="22">
                                        <label for="category-22">Thể Thao</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="category-8" name="filter[category]"
                                               value="8">
                                        <label for="category-8">Tình Cảm</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="category-18" name="filter[category]"
                                               value="18">
                                        <label for="category-18">TV Shows</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="category-5" name="filter[category]"
                                               value="5">
                                        <label for="category-5">Viễn Tưởng</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="category-14" name="filter[category]"
                                               value="14">
                                        <label for="category-14">Võ Thuật</label>
                                    </li>
                                </ul>
                            </div>

                            <div class="filter dropdown">
                                <button type="button" class="dropdown-toggle" data-toggle="dropdown"> Quốc gia
                                    <span id="filtercount">Toàn bộ</span> <i class="fa fa-angle-down"
                                                                             aria-hidden="true"></i></button>
                                <ul class="dropdown-menu c4">
                                    <li>
                                        <input type="radio" id="region-all" name="filter[region]" value=""
                                               checked>
                                        <label for="region-all">Toàn bộ</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="region-38" name="filter[region]"
                                               value="38">
                                        <label for="region-38">Ả Rập Xê Út</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="region-10" name="filter[region]"
                                               value="10">
                                        <label for="region-10">Ấn Độ</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="region-6" name="filter[region]"
                                               value="6">
                                        <label for="region-6">Anh</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="region-44" name="filter[region]"
                                               value="44">
                                        <label for="region-44">Argentina</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="region-4" name="filter[region]"
                                               value="4">
                                        <label for="region-4">Âu Mỹ</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="region-33" name="filter[region]"
                                               value="33">
                                        <label for="region-33">Ba lan</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="region-34" name="filter[region]"
                                               value="34">
                                        <label for="region-34">Bỉ</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="region-37" name="filter[region]"
                                               value="37">
                                        <label for="region-37">Bồ Đào Nha</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="region-15" name="filter[region]"
                                               value="15">
                                        <label for="region-15">Brazil</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="region-12" name="filter[region]"
                                               value="12">
                                        <label for="region-12">Canada</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="region-19" name="filter[region]"
                                               value="19">
                                        <label for="region-19">Châu Phi</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="region-41" name="filter[region]"
                                               value="41">
                                        <label for="region-41">Chile</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="region-29" name="filter[region]"
                                               value="29">
                                        <label for="region-29">Colombia</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="region-16" name="filter[region]"
                                               value="16">
                                        <label for="region-16">Đài Loan</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="region-27" name="filter[region]"
                                               value="27">
                                        <label for="region-27">Đan Mạch</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="region-8" name="filter[region]"
                                               value="8">
                                        <label for="region-8">Đức</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="region-30" name="filter[region]"
                                               value="30">
                                        <label for="region-30">Hà Lan</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="region-2" name="filter[region]"
                                               value="2">
                                        <label for="region-2">Hàn Quốc</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="region-5" name="filter[region]"
                                               value="5">
                                        <label for="region-5">Hồng Kông</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="region-42" name="filter[region]"
                                               value="42">
                                        <label for="region-42">Hy Lạp</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="region-32" name="filter[region]"
                                               value="32">
                                        <label for="region-32">Indonesia</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="region-28" name="filter[region]"
                                               value="28">
                                        <label for="region-28">Ireland</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="region-23" name="filter[region]"
                                               value="23">
                                        <label for="region-23">Malaysia</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="region-22" name="filter[region]"
                                               value="22">
                                        <label for="region-22">Mexico</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="region-31" name="filter[region]"
                                               value="31">
                                        <label for="region-31">Na Uy</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="region-11" name="filter[region]"
                                               value="11">
                                        <label for="region-11">Nam Phi</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="region-20" name="filter[region]"
                                               value="20">
                                        <label for="region-20">Nga</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="region-3" name="filter[region]"
                                               value="3">
                                        <label for="region-3">Nhật Bản</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="region-43" name="filter[region]"
                                               value="43">
                                        <label for="region-43">Nigeria</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="region-39" name="filter[region]"
                                               value="39">
                                        <label for="region-39">Phần Lan</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="region-13" name="filter[region]"
                                               value="13">
                                        <label for="region-13">Pháp</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="region-7" name="filter[region]"
                                               value="7">
                                        <label for="region-7">Philippines</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="region-17" name="filter[region]"
                                               value="17">
                                        <label for="region-17">Quốc Gia Khác</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="region-45" name="filter[region]"
                                               value="45">
                                        <label for="region-45">Singapore</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="region-21" name="filter[region]"
                                               value="21">
                                        <label for="region-21">Tây Ban Nha</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="region-14" name="filter[region]"
                                               value="14">
                                        <label for="region-14">Thái Lan</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="region-24" name="filter[region]"
                                               value="24">
                                        <label for="region-24">Thổ Nhĩ Kỳ</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="region-26" name="filter[region]"
                                               value="26">
                                        <label for="region-26">Thụy Điển</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="region-9" name="filter[region]"
                                               value="9">
                                        <label for="region-9">Thụy Sĩ</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="region-1" name="filter[region]"
                                               value="1">
                                        <label for="region-1">Trung Quốc</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="region-35" name="filter[region]"
                                               value="35">
                                        <label for="region-35">UAE</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="region-18" name="filter[region]"
                                               value="18">
                                        <label for="region-18">Úc</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="region-36" name="filter[region]"
                                               value="36">
                                        <label for="region-36">Ukraina</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="region-40" name="filter[region]"
                                               value="40">
                                        <label for="region-40">Việt Nam</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="region-25" name="filter[region]"
                                               value="25">
                                        <label for="region-25">Ý</label>
                                    </li>
                                </ul>
                            </div>

                            <div class="filter dropdown">
                                <button type="button" class="dropdown-toggle" data-toggle="dropdown"> Năm phát hành
                                    <span id="filtercount">Toàn bộ</span> <i class="fa fa-angle-down"
                                                                             aria-hidden="true"></i></button>
                                <ul class="dropdown-menu c4">
                                    <li>
                                        <input type="radio" id="year-all" name="filter[year]" value=""
                                               checked>
                                        <label for="year-all">Toàn bộ</label>
                                    </li>

                                    <li>
                                        <input type="radio" id="year-2026" name="filter[year]"
                                               value="2026"
                                        >
                                        <label for="year-2026">2026</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="year-2025" name="filter[year]"
                                               value="2025"
                                        >
                                        <label for="year-2025">2025</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="year-2024" name="filter[year]"
                                               value="2024"
                                        >
                                        <label for="year-2024">2024</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="year-2023" name="filter[year]"
                                               value="2023"
                                        >
                                        <label for="year-2023">2023</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="year-2022" name="filter[year]"
                                               value="2022"
                                        >
                                        <label for="year-2022">2022</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="year-2021" name="filter[year]"
                                               value="2021"
                                        >
                                        <label for="year-2021">2021</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="year-2020" name="filter[year]"
                                               value="2020"
                                        >
                                        <label for="year-2020">2020</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="year-2019" name="filter[year]"
                                               value="2019"
                                        >
                                        <label for="year-2019">2019</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="year-2018" name="filter[year]"
                                               value="2018"
                                        >
                                        <label for="year-2018">2018</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="year-2017" name="filter[year]"
                                               value="2017"
                                        >
                                        <label for="year-2017">2017</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="year-2016" name="filter[year]"
                                               value="2016"
                                        >
                                        <label for="year-2016">2016</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="year-2015" name="filter[year]"
                                               value="2015"
                                        >
                                        <label for="year-2015">2015</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="year-2014" name="filter[year]"
                                               value="2014"
                                        >
                                        <label for="year-2014">2014</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="year-2013" name="filter[year]"
                                               value="2013"
                                        >
                                        <label for="year-2013">2013</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="year-2012" name="filter[year]"
                                               value="2012"
                                        >
                                        <label for="year-2012">2012</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="year-2011" name="filter[year]"
                                               value="2011"
                                        >
                                        <label for="year-2011">2011</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="year-2010" name="filter[year]"
                                               value="2010"
                                        >
                                        <label for="year-2010">2010</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="year-2009" name="filter[year]"
                                               value="2009"
                                        >
                                        <label for="year-2009">2009</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="year-2008" name="filter[year]"
                                               value="2008"
                                        >
                                        <label for="year-2008">2008</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="year-2007" name="filter[year]"
                                               value="2007"
                                        >
                                        <label for="year-2007">2007</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="year-2006" name="filter[year]"
                                               value="2006"
                                        >
                                        <label for="year-2006">2006</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="year-2005" name="filter[year]"
                                               value="2005"
                                        >
                                        <label for="year-2005">2005</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="year-2004" name="filter[year]"
                                               value="2004"
                                        >
                                        <label for="year-2004">2004</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="year-2003" name="filter[year]"
                                               value="2003"
                                        >
                                        <label for="year-2003">2003</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="year-2002" name="filter[year]"
                                               value="2002"
                                        >
                                        <label for="year-2002">2002</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="year-2001" name="filter[year]"
                                               value="2001"
                                        >
                                        <label for="year-2001">2001</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="year-2000" name="filter[year]"
                                               value="2000"
                                        >
                                        <label for="year-2000">2000</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="year-1999" name="filter[year]"
                                               value="1999"
                                        >
                                        <label for="year-1999">1999</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="year-1998" name="filter[year]"
                                               value="1998"
                                        >
                                        <label for="year-1998">1998</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="year-1997" name="filter[year]"
                                               value="1997"
                                        >
                                        <label for="year-1997">1997</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="year-1996" name="filter[year]"
                                               value="1996"
                                        >
                                        <label for="year-1996">1996</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="year-1995" name="filter[year]"
                                               value="1995"
                                        >
                                        <label for="year-1995">1995</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="year-1994" name="filter[year]"
                                               value="1994"
                                        >
                                        <label for="year-1994">1994</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="year-1993" name="filter[year]"
                                               value="1993"
                                        >
                                        <label for="year-1993">1993</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="year-1992" name="filter[year]"
                                               value="1992"
                                        >
                                        <label for="year-1992">1992</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="year-1991" name="filter[year]"
                                               value="1991"
                                        >
                                        <label for="year-1991">1991</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="year-1990" name="filter[year]"
                                               value="1990"
                                        >
                                        <label for="year-1990">1990</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="year-1989" name="filter[year]"
                                               value="1989"
                                        >
                                        <label for="year-1989">1989</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="year-1988" name="filter[year]"
                                               value="1988"
                                        >
                                        <label for="year-1988">1988</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="year-1987" name="filter[year]"
                                               value="1987"
                                        >
                                        <label for="year-1987">1987</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="year-1986" name="filter[year]"
                                               value="1986"
                                        >
                                        <label for="year-1986">1986</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="year-1985" name="filter[year]"
                                               value="1985"
                                        >
                                        <label for="year-1985">1985</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="year-1984" name="filter[year]"
                                               value="1984"
                                        >
                                        <label for="year-1984">1984</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="year-1983" name="filter[year]"
                                               value="1983"
                                        >
                                        <label for="year-1983">1983</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="year-1982" name="filter[year]"
                                               value="1982"
                                        >
                                        <label for="year-1982">1982</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="year-1981" name="filter[year]"
                                               value="1981"
                                        >
                                        <label for="year-1981">1981</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="year-1980" name="filter[year]"
                                               value="1980"
                                        >
                                        <label for="year-1980">1980</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="year-1979" name="filter[year]"
                                               value="1979"
                                        >
                                        <label for="year-1979">1979</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="year-1978" name="filter[year]"
                                               value="1978"
                                        >
                                        <label for="year-1978">1978</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="year-1977" name="filter[year]"
                                               value="1977"
                                        >
                                        <label for="year-1977">1977</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="year-1976" name="filter[year]"
                                               value="1976"
                                        >
                                        <label for="year-1976">1976</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="year-1975" name="filter[year]"
                                               value="1975"
                                        >
                                        <label for="year-1975">1975</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="year-1974" name="filter[year]"
                                               value="1974"
                                        >
                                        <label for="year-1974">1974</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="year-1973" name="filter[year]"
                                               value="1973"
                                        >
                                        <label for="year-1973">1973</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="year-1972" name="filter[year]"
                                               value="1972"
                                        >
                                        <label for="year-1972">1972</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="year-1971" name="filter[year]"
                                               value="1971"
                                        >
                                        <label for="year-1971">1971</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="year-1970" name="filter[year]"
                                               value="1970"
                                        >
                                        <label for="year-1970">1970</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="year-1969" name="filter[year]"
                                               value="1969"
                                        >
                                        <label for="year-1969">1969</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="year-1968" name="filter[year]"
                                               value="1968"
                                        >
                                        <label for="year-1968">1968</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="year-1967" name="filter[year]"
                                               value="1967"
                                        >
                                        <label for="year-1967">1967</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="year-1966" name="filter[year]"
                                               value="1966"
                                        >
                                        <label for="year-1966">1966</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="year-1965" name="filter[year]"
                                               value="1965"
                                        >
                                        <label for="year-1965">1965</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="year-1964" name="filter[year]"
                                               value="1964"
                                        >
                                        <label for="year-1964">1964</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="year-1963" name="filter[year]"
                                               value="1963"
                                        >
                                        <label for="year-1963">1963</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="year-1962" name="filter[year]"
                                               value="1962"
                                        >
                                        <label for="year-1962">1962</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="year-1961" name="filter[year]"
                                               value="1961"
                                        >
                                        <label for="year-1961">1961</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="year-1960" name="filter[year]"
                                               value="1960"
                                        >
                                        <label for="year-1960">1960</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="year-1959" name="filter[year]"
                                               value="1959"
                                        >
                                        <label for="year-1959">1959</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="year-1958" name="filter[year]"
                                               value="1958"
                                        >
                                        <label for="year-1958">1958</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="year-1957" name="filter[year]"
                                               value="1957"
                                        >
                                        <label for="year-1957">1957</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="year-1956" name="filter[year]"
                                               value="1956"
                                        >
                                        <label for="year-1956">1956</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="year-1955" name="filter[year]"
                                               value="1955"
                                        >
                                        <label for="year-1955">1955</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="year-1954" name="filter[year]"
                                               value="1954"
                                        >
                                        <label for="year-1954">1954</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="year-1953" name="filter[year]"
                                               value="1953"
                                        >
                                        <label for="year-1953">1953</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="year-1952" name="filter[year]"
                                               value="1952"
                                        >
                                        <label for="year-1952">1952</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="year-1951" name="filter[year]"
                                               value="1951"
                                        >
                                        <label for="year-1951">1951</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="year-1950" name="filter[year]"
                                               value="1950"
                                        >
                                        <label for="year-1950">1950</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="year-1949" name="filter[year]"
                                               value="1949"
                                        >
                                        <label for="year-1949">1949</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="year-1948" name="filter[year]"
                                               value="1948"
                                        >
                                        <label for="year-1948">1948</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="year-1947" name="filter[year]"
                                               value="1947"
                                        >
                                        <label for="year-1947">1947</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="year-1946" name="filter[year]"
                                               value="1946"
                                        >
                                        <label for="year-1946">1946</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="year-1945" name="filter[year]"
                                               value="1945"
                                        >
                                        <label for="year-1945">1945</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="year-1944" name="filter[year]"
                                               value="1944"
                                        >
                                        <label for="year-1944">1944</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="year-1943" name="filter[year]"
                                               value="1943"
                                        >
                                        <label for="year-1943">1943</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="year-1942" name="filter[year]"
                                               value="1942"
                                        >
                                        <label for="year-1942">1942</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="year-1941" name="filter[year]"
                                               value="1941"
                                        >
                                        <label for="year-1941">1941</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="year-1940" name="filter[year]"
                                               value="1940"
                                        >
                                        <label for="year-1940">1940</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="year-1939" name="filter[year]"
                                               value="1939"
                                        >
                                        <label for="year-1939">1939</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="year-1938" name="filter[year]"
                                               value="1938"
                                        >
                                        <label for="year-1938">1938</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="year-1937" name="filter[year]"
                                               value="1937"
                                        >
                                        <label for="year-1937">1937</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="year-1936" name="filter[year]"
                                               value="1936"
                                        >
                                        <label for="year-1936">1936</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="year-1934" name="filter[year]"
                                               value="1934"
                                        >
                                        <label for="year-1934">1934</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="year-1933" name="filter[year]"
                                               value="1933"
                                        >
                                        <label for="year-1933">1933</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="year-1932" name="filter[year]"
                                               value="1932"
                                        >
                                        <label for="year-1932">1932</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="year-1931" name="filter[year]"
                                               value="1931"
                                        >
                                        <label for="year-1931">1931</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="year-1928" name="filter[year]"
                                               value="1928"
                                        >
                                        <label for="year-1928">1928</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="year-1925" name="filter[year]"
                                               value="1925"
                                        >
                                        <label for="year-1925">1925</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="year-1923" name="filter[year]"
                                               value="1923"
                                        >
                                        <label for="year-1923">1923</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="year-1921" name="filter[year]"
                                               value="1921"
                                        >
                                        <label for="year-1921">1921</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="year-1920" name="filter[year]"
                                               value="1920"
                                        >
                                        <label for="year-1920">1920</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="year-1918" name="filter[year]"
                                               value="1918"
                                        >
                                        <label for="year-1918">1918</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="year-1914" name="filter[year]"
                                               value="1914"
                                        >
                                        <label for="year-1914">1914</label>
                                    </li>
                                </ul>
                            </div>

                            <div class="filter submit">
                                <button type="submit" class="btn btn-custom-search"><i class="fa fa-search"
                                                                                       aria-hidden="true"></i>
                                    Lọc Phim
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="clear"></div>
                <div class="listupd">
                    @foreach($movies as $phim)
                    <article class="bs" itemscope="itemscope" itemtype="http://schema.org/CreativeWork">
                        <div class="bsx">
                            <a href="{{route('movie', $phim->slug)}}"
                                            itemprop="url"
                                            title="{{$phim->name}} ({{$phim->origin_name}}) [{{$phim->year}}]"
                                            class="tip" rel="{{$phim->server_id}}">
                                <div class="limit">
                                    <div class="hotbadge"><i class="fas fa-fire-alt"></i></div>
                                    <div class="typez Drama">{{getMovieType($phim->type)}}</div>
                                    <div class="ply"><i class="far fa-play-circle"></i></div>
                                    <div class="bt"><span class="epx">{{getEpxStatus($phim->status)}}</span> <span class="sb Soft Sub">{{$phim->lang}}</span></div>
                                    <img data-type="lazy"
                                         src="{{renderMovieImage($movie, 'thumb')}}"
                                         data-src="{{renderMovieImage($movie, 'thumb')}}"
                                         class="ts-post-image wp-post-image attachment-medium size-medium"
                                         decoding="async" itemprop="image"
                                         title="{{$phim->name}} ({{$phim->origin_name}}) [{{$phim->year}}]"
                                         alt="{{$phim->name}} ({{$phim->origin_name}}) [{{$phim->year}}]"
                                         width="240" height="300"/>
                                </div>
                                <div class="ttt">
                                    <div class="tt"> {{$phim->name}}
                                        <h2 itemprop="headline">{{$phim->origin_name}}</h2>
                                    </div>
                                    <div class="timeago">{{$phim->origin_name}}</div>
                                </div>
                            </a></div>
                    </article>
                    @endforeach
                </div>
                {{$movies->links()}}
                <div class="clear"></div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
@endsection
