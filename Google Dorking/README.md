# **Crawler là gì và bọn nó làm gì?**
- Crawler được dùng để ***tìm kiếm nội dung*** của một trang web, và nó có rất nhiều cách thức tìm kiếm khác nhau
- Một trong những cách đó là ***truy cập vào URL*** của trang web, lấy thông tin trong trang đấy và trả về cho ***search engine*** (công cụ tìm kiếm/trình tìm kiếm)
- Một cách khác là ***truy cập vào tất cả URL*** trong trang web được crawl trước đó
## *Minh họa:*
<p align="center">
    <img src="../src/crawler1.png" style="width: 600px">
</p>

- Khi crawler vào URL trang web `mywebsite.com`, nó sẽ ***index*** nội dung của toàn bộ trang web, tìm ra các ***keywords*** và nội dung của trang. Trong ví dụ trên, `mywebsite.com` có những từ khóa như là `Apple, Banana, Pear`
- Các keywords này được crawler lưu vào trong một cái gọi là ***từ điển*** (dictionary), sau đó được ***trả về cho search engine***, ở đây là Google. Nhờ vậy mà Google mới biết được `mywebsite.com` có các từ khóa trên
- Bởi vì chỉ có duy nhất một website được crawled, nên nếu có một người dùng nào đó tìm kiếm từ khóa `Apple`, `mywebsite.com` sẽ hiện ra, tương tự với các từ khóa `Banana` và `Pear`. Như vậy nếu search engine chỉ có duy nhất nội dung của website được crawl với các từ khóa đó, website đó sẽ là website ***duy nhất*** mà người dùng được trả về
- Tuy nhiên, crawler sẽ tiếp tục ***crawl tất cả URL và file*** mà nó tìm được. Giả sử `mywebsite.com` có thêm đường dẫn tới `anotherwebsite.com`, crawler cũng sẽ vào URL của trang web đó và tiếp tục tìm kiếm thông tin trong đó. Như vậy cái từ điển của crawler nó sẽ chứa cả keyword của website `mywebsite.com` là `Apple, Banana, Pear` và `anotherwebsite.com` là `Tomatoes, Strawberries, Pineapples`. Những từ khóa này sau đó tiếp tục được lưu trữ trong search engine
<p align="center">
    <img src="../src/crawler2.png" style="width: 600px">
</p>

- Nghe thì có vẻ cũng ổn đấy, nhưng mà một trang web có rất nhiều URL dẫn đến các trang khác nhau, như vậy crawler sẽ crawl rất nhiều đúng không? Chưa kể khả năng các trang web khác nhau sẽ có nội dung giống nhau nữa. ***Vậy làm như nào để search engine có thể cho ra được website nào được hiển thị trước cái nào?***
- Đáp án:
<p align="center">
    <img src="../src/ans1.png" style="width: 400px">
</p>

# **Tối ưu hóa Search Engine**
- ***Search Engine Optimization*** (SEO) là một chủ để phổ biến trong giới search engine hiện nay. Nó phổ biến và thậm chí đem lại rất nhiều lợi nhuận, tới nỗi mà các doanh nghiệp lớn đầu tư rất nhiều để cải thiện SEO ***"ranking"*** - thứ hạng xuất hiện của trang web trên search engine
- Để trả lời câu hỏi cho phần trước, các search engine sẽ ưu tiên cho các website mà dễ index hơn. Và có rất nhiều yếu tố để đánh giá ***độ tối ưu*** của một trang web, ví dụ như:
    * Mức độ phản hồi của trang web với các trình duyệt khác nhau
    * Mức độ khó dễ khi crawl một website thông qua việc sử dụng ***sitemap***
    * Website có những từ khóa gì
- Việc đánh giá các website giữa các search engine khác nhau nhìn chung sẽ khác nhau. Nhưng cuối cùng thì, các doanh nghiệp hoàn toàn có thể trả tiền để quảng cáo website, hoặc để boost "rank" của website
- Có các tool online có thể dùng để đánh giá mức độ tối ưu của một trang web. Ví dụ như ***Google's Site Analyser***
- Nhưng mà... cái gì sẽ điều tiết các con crawler? Bên cạnh việc search engine cung cấp các con crawlers, các chủ website ***tự bọn họ*** có thể ***"bảo"*** (***stipulate***) crawler ***những nội dung nào có thể thu thập***. Thông thường các search engine sẽ muốn ***thu thập hết*** nội dung của một trang web, tuy nhiên một vài trường hợp chúng ta không muốn tất cả mọi thứ trong trang web được indexed. Ví dụ như các ***trang của admin*** chẳng hạn. Đương nhiên chúng ta không muốn tất cả mọi người đều có thể truy cập vào trang này, đặc biệt là thông qua thanh công cụ tìm kiếm của các search engine. Vậy là lúc này, xin giới thiệu, ***robots.txt***

# **Robots.txt**
- Đây là file cần được đặt ***ngay dưới thư mục root*** của web server 
- Đây là một file text cho crawler biết ***quyền*** của nó trên website
- Syntax trong robots.txt:
    * *User-agent*: ***loại crawler*** nào được phép index trên trang. Giá trị của nó có thể là ___ký tự *___ ý chỉ tất cả các crawler
    * *Allow*: thư mục hoặc file mà crawler ***có thể*** index
    * *Disallow*: thư mục hoặc file mà crawler ***không được*** index
    * *Sitemap*: cung cấp ***đường dẫn tới sitemap*** (phần sau nói rõ hơn)
    #### VD1:
<p align="center">
    <img src="../src/robots1.png" style="width: 600px">
</p>

- Tất cả các crawler đều có thể index website
- Crawler được phép index toàn bộ nội dung của site
- Sitemap nằm ở `http://mywebsite.com/sitemap.xml`

    #### VD2:
<p align="center">
    <img src="../src/robots2.png" style="width: 600px">
</p>

- Tất cả các crawler đều có thể index website
- Crawler được phép index toàn bộ nội dung của site ngoại trừ nội dung trong đường dẫn `/super-secret-directory` và `/not-a-secret/but-this-is`. Tuy nhiên các thư mục và file khác nằm trong `/not-a-secret/` ngoại trừ `but-this-is/` vẫn được crawler index
- Sitemap nằm ở `http://mywebsite.com/sitemap.xml`

    #### VD3:
<p align="center">
    <img src="../src/robots3.png" style="width: 600px">
</p>

- Crawler `Googlebot` được phép index toàn bộ site
- Crawler `msnbot` không được index site
- Đối với các files mà mình không muốn crawler index tới, cách "thẳng" nhất là liệt kê các file đó ra. Nhưng nó sẽ không thiết thực nếu chúng ta có rất nhiều file. Thế nên chúng ta có thể tận dụng regex ở đây
<p align="center">
    <img src="../src/robots4.png" style="width: 600px">
</p>

- Tất cả các crawler đều có thể index website
- Crawler không thể index các file mà có ext là `.ini` (nhờ dấu __*__) nằm trong bất kỳ thư mục nào (nhờ dấu __$__)
- Đáp án:
<p align="center">
    <img src="../src/ans2.png" style="width: 400px">
</p>

# **Sitemaps**
- Giống như bản đồ địa lý trong đời sống hàng ngày, sitemap cũng giống vậy nhưng dành cho website thui
- Sitemaps đóng vai trò như sự chỉ dẫn giúp cho crawler, bởi chúng chỉ ra những con đường để thu thập thông tin trong website. Cái biểu đồ bên dưới là ví dụ minh họa cho sitemap của một website:
<p align="center">
    <img src="../src/sitemap.png" style="width: 600px">
</p>

- Màu sau xanh dương thì là thư mục, màu xanh là thì là file, tức trang web cụ thể trên web. Tuy nhiên nó chỉ mang tính chất ***MINH HỌA***, còn thực tế nó có thể nhìn giống như này:
<p align="center">
    <img src="../src/sitemap2.png" style="width: 600px">
</p>

- Sitemap thường được viết dưới dạng XML. Sitemap cũng có ảnh hưởng đến SEO, bởi nó làm cho việc crawl thông tin của website trở nên dễ dàng hơn
- Tại sao sitemap lại thích hợp cho các search engine? Thực tế là, các search engine lười lắm, bởi nó có hàng tá dữ liệu cần phải xử lý rồi. Sitemap đã định sẵn con đường cho crawler đi nên nó chỉ việc đi thôi mà không cần phải tìm đường nữa

# **Google Dorking là gì?**
## *Tận dụng Google để tìm kiếm nâng cao*
- Google Dorking là kỹ thuật tìm kiếm thông minh và nâng cao bằng cách sử dụng các toán tử tìm kiếm, giúp việc tìm thông tin dễ dàng và chính xác hơn
- Google không chỉ là một nguồn ***tìm kiếm ảnh***, mà còn có thể sử dụng để ***thực hiện các phép toán***. Ngoài ra, việc sử dụng ***nháy kép*** trong trường tìm kiếm giúp Google tìm kiếm các thông tin chỉ nằm trong chuỗi đó, và trả về các trang web ***chứa chính xác chuỗi đó*** thôi

## *Cải thiện chuỗi truy vấn*
- Kết hợp từ khóa `site: + <tên website>` để tìm các từ khóa nằm trong website được đề cập
- Ví dụ nếu ta chỉ tìm kiếm thông thường từ khóa sau, ta nhận được hơn 1 triệu kết quả
<p align="center">
    <img src="../src/dork1.png" style="width: 600px">
</p>

- Khi thêm `site:` vào, kết quả chỉ còn hơn 300 nghìn, và chỉ chứa chính xác website mình muốn
<p align="center">
    <img src="../src/dork2.png" style="width: 600px">
</p>

- Ngoài ra còn rất nhiều từ khóa khác:
    * `filetype: <kiểu file>`: tìm kiếm theo định dạng của file
    * `cache:` tìm phiên bản cache của URL được truy vấn
    * `intitle:` chuỗi truy vấn sau nó phải nằm trong tiêu đề của web
- Song, sự tiện ích của nó cũng có thể đem lại nhiều sự nguy hiểm tiềm tàng. Nếu `filetype:` kết hợp với một định dạng file nhạy cảm nào đó, và nếu một trang web nào đó không được giữ cẩn thận, file đó sẽ hiện lên kết quả tìm kiếm. Ngoài ra Google Dorking cũng có thể sử dụng để thực hiện tấn công ***Path Traversal***:
<p align="center">
    <img src="../src/path_traversal.png" style="width: 600px">
</p>
- Đáp án:
<p align="center">
    <img src="../src/ans3.png" style="width: 400px">
</p>