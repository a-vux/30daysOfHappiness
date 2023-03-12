# Reflected XSS
## *Lab 1: Reflected XSS into HTML context with nothing encoded*
### **Lab Description:**
<p align="center">
    <img src="./src/01_1.png" style="width: 500px;">
</p>

* Input không được kiểm duyệt gì

### **Solution:**
* Nhập vào thanh tìm kiếm payload sau
<p align="center">
    <img src="./src/01_2.png" style="width: 500px;">
</p>

* Sau đó màn hiện thông báo alert, và lab được solved
<p align="center">
    <img src="./src/01_3.png" style="width: 500px;">
</p>



## *Lab 7: Reflected XSS into attribute with angle brackets HTML-encoded*
### **Lab Description:**
<p align="center">
    <img src="./src/07_1.png" style="width: 500px;">
</p>

* Lab đã mã hóa HTML dấu ngoặc nhọn trong thuộc tính của thẻ
* Khai thác giữa các attributes của tag

### **Solution:**
* Thử search một chuỗi bất kỳ, thấy giá trị của nó được lưu vào trong thuộc tính value của thẻ input
<p align="center">
    <img src="./src/07_2.png" style="width: 500px;">
</p>

* Thử thêm dấu nháy kép vào chuỗi, ta thấy giá trị của `value` bị đóng lại và chuỗi bị nằm bên ngoài
<p align="center">
    <img src="./src/07_3.png" style="width: 500px;">
</p>

* Thử payload như sau, nhưng có thể thấy dấu "<" và ">" đã bị mã hóa, nên ta ko thể thêm tag mới được
<p align="center">
    <img src="./src/07_4.png" style="width: 500px;">
</p>

* Ta có thể nghĩ tới việc thêm thuộc tính mới. Sử dụng thuộc tính onmouseover="alert(1)", tức mỗi lần di chuột vào thẻ này sẽ hiện alert
<p align="center">
    <img src="./src/07_5.png" style="width: 500px;">
</p>



## *Lab 9: Reflected XSS into a JavaScript string with angle brackets HTML encoded*
### **Lab Description:**
<p align="center">
    <img src="./src/09_1.png" style="width: 500px;">
</p>

* Khai thác thông qua chuỗi trong JS

### **Solution:**
* Search một chuỗi bất kỳ, ta thấy chuỗi đó được pass vào script sau
<p align="center">
    <img src="./src/09_2.png" style="width: 500px;">
</p>
❗Giải thích script: 

1. Tạo biến `searchTerm` thông qua giá trị người dùng nhập
2. Mã hóa URL biến đó rồi truyền vào hàm `document.write()`

* Thử thêm dấu nháy đơn ở trước chuỗi, ta thấy nó đóng lại dấu nháy trước đó và payload giờ nằm bên ngoài
<p align="center">
    <img src="./src/09_3.png" style="width: 500px;">
</p>

* Để hoàn chỉnh các cú pháp trong JS, ta thay đoạn payload sau (2 dấu gạch ở cuối dùng để comment, tức vô hiệu hóa đoạn code phía sau của dòng đó), và lab đã được solved
<p align="center">
    <img src="./src/09_4.png" style="width: 500px;">
</p>



## *Lab 17: Reflected XSS into HTML context with most tags and attributes blocked*
### **Lab Description:**
<p align="center">
    <img src="./src/17_1.png" style="width: 500px;">
</p>

* Hầu hết các tags, attributes, events đã bị WAF chặn thông qua một list

### **Solution:**
* Test thử giá trị chuỗi ngẫu nhiên, ta có thấy giá trị trả về trong phản hồi, nhưng F12 không thấy có script nào liên quan đến giá trị này cả, nên ta không biết được cách mà chuỗi này được chèn như thế nào
<p align="center">
    <img src="./src/17_2.png" style="width: 500px;">
</p>

* Thử chèn payload gồm các thẻ, ta bị chặn và trang hiển thị "Không được phép dùng tag"
<p align="center">
    <img src="./src/17_3.png" style="width: 500px;">
</p>

* Nhưng khi thử một tag không tồn tại hoặc những cú pháp giống tag, ta lại không bị chặn, không những thế source code còn include cả tag đó vào
<p align="center">
    <img src="./src/17_4.png" style="width: 500px;">
</p>

* Có thể đoán được ở đây web sẽ lọc theo một list các tags. Ta ném request vào intruder, lấy payload của PortSwigger tất cả các thẻ, rồi attack
<p align="center">
    <img src="./src/17_5.png" style="width: 500px;">
</p>

* Khi attack thành công, ta thấy tất cả các tag đều trả về lỗi 400, nhưng riêng tag `<body>` lại trả về 200
<p align="center">
    <img src="./src/17_6.png" style="width: 500px;">
</p>

* Vậy là tag đó ko bị web chặn, ta kèm thêm attribute như sau nhưng khi gửi, ta lại bị chặn và nhận dòng tin "Không được phép sử dụng attribute"
<p align="center">
    <img src="./src/17_7.png" style="width: 500px;">
</p>

* Làm tương tự, ném vào intruder để attack, nhưng payload lần này là tất cả các event
<p align="center">
    <img src="./src/17_8.png" style="width: 500px;">
</p>

* Khi attack xong, ta thấy tất cả các attribute đều trả về lỗi 400, nhưng có 3 tag trả về 200
<p align="center">
    <img src="./src/17_9.png" style="width: 500px;">
</p>

* Nhưng event `onratechange` thì dùng cho thẻ `video>` khi video được thay đổi rate (nhanh hơn hoặc chậm lại), còn `onbeforeinput` thì lại dùng đối với các tag `<input>` hoặc  `<textarea>` là những tag yêu cầu ***sự thay đổi về nội dung***. Còn event `onresize` được dùng với tag  `<body>` khi ***cửa sổ được thay đổi kích cỡ***. Như vậy ta có payload như sau:
<p align="center">
    <img src="./src/17_10.png" style="width: 500px;">
</p>

## *Lab 18: Reflected XSS into HTML context with all tags blocked except custom ones*
### **Lab Description:**
<p align="center">
    <img src="./src/18_1.png" style="width: 500px;">
</p>

- Lab block tất cả các tags ngoại trừ các tag tự tạo

### **Solution:**
- Do bài này không chặn custom flag, ta cho một tag bất kỳ ngẫu nhiên và thấy tag đó được cho vào source của lab
<p align="center">
    <img src="./src/18_2.png" style="width: 500px;">
</p>



## *Lab 19: Reflected XSS with some SVG markup allowed*
### **Lab Description:**
<p align="center">
    <img src="./src/19_1.png" style="width: 500px;">
</p>

* Hầu hết các tags, attributes, events đã bị WAF chặn thông qua một list

## *Lab 20: Reflected XSS in canonical link tag*

(Em chưa làm được hic)

### **Solution:**
* Bài này các tags bị chặn theo list, nên ta brute xem những tag nào bị chặn, thì ta thấy chỉ có 4 tags `<image>`, `<svg>`, `<title>` và `<animatetransform>` là không bị chặn
<p align="center">
    <img src="./src/19_2.png" style="width: 500px;">
</p>

* Do `<svg>` và `<animatetransform>` hay đi kèm nhau nên trong bài này ta sử dụng cả hai. Chèn payload như sau vào nhưng các events cũng bị chặn
<p align="center">
    <img src="./src/19_3.png" style="width: 500px;">
</p>

* Tương tự cho vào intruder brute event, ta có mỗi event onbegin là không bị chặn
<p align="center">
    <img src="./src/19_4.png" style="width: 500px;">
</p>

* Như vậy ta có payload sau:
<p align="center">
    <img src="./src/19_5.png" style="width: 500px;">
</p>

## *Lab 21: Reflected XSS into a JavaScript string with single quote and backslash escaped*
### **Lab Description:**
<p align="center">
    <img src="./src/21_1.png" style="width: 500px;">
</p>

- Bài này reflect tại chuỗi chèn trong JS và dấu nháy đơn và backlash bị escape

### **Solution:**
- Tìm kiếm thử chuỗi bất kỳ, ta thấy chuỗi được chèn vào script
<p align="center">
    <img src="./src/21-2.png" style="width: 500px;">
</p>

- Thử chèn payload có nháy đơn để đóng chuỗi `'abc` hoặc backlash để chặn backlash `\abc` nhưng đều bị escape cả
<p align="center">
    <img src="./src/21_3.png" style="width: 500px;">
</p>

- Nhưng khi ta chèn `<\script>` thì tag script bị đóng lại ngay lập tức
<p align="center">
    <img src="./src/21_4.png" style="width: 500px;">
</p>

- Vậy nên ta đóng script hiện tại lại và chèn một script mới và lab được solved
<p align="center">
    <img src="./src/21_5.png" style="width: 500px;">
</p>

## *Lab 22: Reflected XSS into a JavaScript string with angle brackets and double quotes HTML-encoded and single quotes escaped*
### **Lab Description:**
<p align="center">
    <img src="./src/22_1.png" style="width: 500px;">
</p>

- Lab đã mã hóa ngoặc nhọn, nháy kép và escape nháy đơn

### **Solution:**
- Do bài này đã mã hóa ngoặc nhọn nên ta không thể đóng script, và nháy đơn cũng đã bị escape
<p align="center">
    <img src="./src/22_2.png" style="width: 500px;">
</p>

- Nhưng lab không escape backlash, vậy nên ta có thể chèn thêm backlash để escape ký tự backlash của nó
<p align="center">
    <img src="./src/22_3.png" style="width: 500px;">
</p>

- Vậy nên chỉ cần chèn payload như sau là lab được solved
<p align="center">
    <img src="./src/22_4.png" style="width: 500px;">
</p>

## *Lab 24: Reflected XSS into a template literal with angle brackets, single, double quotes, backslash and backticks Unicode-escaped*
### **Lab Description:**
<p align="center">
    <img src="./src/24_1.png" style="width: 500px;">
</p>

- Chuỗi được đặt trong template literal (dấu backtick)
- Ngoặc nhọn, nháy đơn nháy kép, backlash, backtick đều bị escape

### **Solution:**
- Do chuỗi được đặt trong string template, mà đặc điểm của string template là có thể chèn các expression dưới dạng `${...}` trong nó
<p align="center">
    <img src="./src/24_2.png" style="width: 500px;">
</p>

- Do vậy, ta chỉ cần chèn payload như dưới là lab được solved
<p align="center">
    <img src="./src/24_3.png" style="width: 500px;">
</p>

# ***Stored XSS***

## *Lab 2: Stored XSS into HTML context with nothing encoded*
### **Lab Description:**
<p align="center">
    <img src="./src/02_1.png" style="width: 500px;">
</p>

### **Solution:**
* Chọn một bài post bất kỳ rồi vào comment đoạn payload sau
<p align="center">
    <img src="./src/02_2.png" style="width: 500px;">
</p>

* Sau khi gửi comment, web trả về thông báo sau
<p align="center">
    <img src="./src/02_4.png" style="width: 500px;">
</p>

* Giờ mỗi lần vào post đó sẽ có một đoạn alert hiển thị lên, là lab được solved
<p align="center">
    <img src="./src/02_3.png" style="width: 500px;">
</p>

❗P/s: chẳng hiểu sao vào comment thì không được nhưng vào tên thì lại được



## *Lab 8: Stored XSS into anchor href attribute with double quotes HTML-encoded*
### **Lab Description:**
<p align="center">
    <img src="./src/08_1.png" style="width: 500px;">
</p>

### **Solution:**
* Vào bài post bất kỳ, điền đầy đủ các trường comment, tên, email, website. Có thể thấy có thẻ &lt;a> với href đến đường link mình điền vào website
<p align="center">
    <img src="./src/08_2.png" style="width: 500px;">
</p>

* Thử thêm dấu nháy kép vào trước website, ta thấy giờ thuộc tính đã bị đóng và payload của ta nằm ở ngoài giá trị thuộc tính
<p align="center">
    <img src="./src/08_3.png" style="width: 500px;">
</p>

* Sử dụng thêm thuộc tính onmouseover để hiện thị alert mỗi lần di chuột qua, thế là lab được solved
<p align="center">
    <img src="./src/08_4.png" style="width: 500px;">
</p>



## *Lab 14: Exploiting cross-site scripting to steal cookies*
### **Lab Description:**
<p align="center">
    <img src="./src/14_1.png" style="width: 500px;">
</p>

### **Solution:**
* Vào một post bất kỳ, viết comment như sau, và đoạn script thực hiện được bình thường, có nghĩa là ở đây đã bị Stored XSS
<p align="center">
    <img src="./src/14_2.png" style="width: 500px;">
</p>

* Nhưng để có thể lấy được cookie của những người dùng truy cập trang này, ta phải thông qua Burp Collaborator. Ta vẫn vào mục comment nhưng script sẽ là như sau:
<p align="center">
    <img src="./src/14_3.png" style="width: 500px;">
</p>

❗Đoạn script dùng để thực hiện gửi request POST đến cái URL kia, với body chứa cookie của những người gặp phải cái comment này

* Gửi script đó, quay lại Burp Collaborator và Poll Now. Đợi một lúc sẽ thấy xuất hiện:
<p align="center">
    <img src="./src/14_4.png" style="width: 500px;">
</p>

* Bên dưới phần request, xem xuống body thấy có giá trị session của người dùng
<p align="center">
    <img src="./src/14_5.png" style="width: 500px;">
</p>

* Copy giá trị đó, rồi bật Intercept lên, thay session của mình bằng cái kia, và thế là ta đã đăng nhập dưới session của người khác
<p align="center">
    <img src="./src/14_6.png" style="width: 500px;">
</p>

# ***DOM-based XSS***
## *Lab 3: DOM XSS in document.write sink using source location.search*
### **Lab Description:**
<p align="center">
    <img src="./src/03_1.png" style="width: 500px;">
</p>

* Web sử dụng document.write() để viết data lên page và data được lấy thông qua window.location.search (là phần param của URL)

### **Solution:**
* Search một đoạn bất kỳ trên thanh. Inspect thử đoạn script thì ta thấy nội dung sau
<p align="center">
    <img src="./src/03_2.png" style="width: 500px;">
</p>

    ❗Đoạn script có những nội dung sau:
    1. Tạo hàm tên trackSearch với tham số query
    2. Hàm document.write(...) dùng để ghi trực tiếp chuỗi trong hàm lên HTML. Ở đây dùng để chèn thêm tag <img> với src là path được gắn chuỗi query một cách trực tiếp lên trang tại vị trí đó
    3. window.location.search trả về chuỗi truy vấn (search) của đối tượng location (mang thông tin về URL) trong đối tượng window. Ở đây sẽ là ?search=abc
    4. Constructor URLSearchParams() lấy giá trị bên trên làm tham số và được dùng để tạo một đối tượng URLSearchParams chuyên làm việc với chuỗi truy vấn của URL
    5. Đối tượng URLSearchParams có một phương thức là get(param) dùng để trả về giá trị của param
    6. Nói chung, query sẽ có giá trị bằng "abc"
    7. Nếu query ko rỗng thì gọi tới hàm trackSearch. Do đó bên dưới ta có thêm thẻ <img>

* Do việc nối chuỗi trực tiếp như trong script, ta chèn payload như sau vào thanh search
<p align="center">
    <img src="./src/03_3.png" style="width: 500px;">
</p>

* Thông báo alert hiện ra, và lab được solved

        ❗Giải thích payload: Dấu nháy kép đầu tiên dùng để kết thúc thuộc tính src, dấu ">" tiếp theo dùng để đóng tag <img>. Đoạn payload của ta nằm ở trong <script>. Do đó trên trang hiển thị dòng "> như là phần còn thừa của script 



## Lab 4: DOM XSS in innerHTML sink using source location.search
### Lab Description:
<p align="center">
    <img src="./src/04_1.png" style="width: 500px;">
</p>

* Web sử dụng innerHTML để thay đổi data trên page, và data được lấy thông qua window.location.search

### **Solution:**
* Search một đoạn bất kỳ trên thanh. Inspect thử đoạn script thì ta thấy nội dung sau
<p align="center">
    <img src="./src/04_2.png" style="width: 500px;">
</p>

```
❗Đoạn script có những nội dung sau:
    1. document.getElementById(id) dùng để trả về đối tượng có id được truyền vào
    2. Đối tượng đó có phương thức là innerHTML, dùng để trả về nội dung của thẻ đó, tức text và các tag con trong nó
    3. Ở đây, đối tượng nào trong document có id là "searchMessage" sẽ được thay thế nội dung thành query. Và bên trên có một thẻ span với id như vậy
```

* Do đó, ta chèn được đoạn payload như sau:
<p align="center">
    <img src="./src/04_3.png" style="width: 500px;">
</p>

* Bởi tính chất của phương thức innerHTML, ta có thể sửa/thêm các tags khác vào. Ở đây alert hiện ra là do src có giá trị lỗi nên thuộc tính onerror được gọi tới và sinh ra alert
<p align="center">
    <img src="./src/03_4.png" style="width: 500px;">
</p>

## *Lab 5: DOM XSS in jQuery anchor href attribute sink using location.search source*
### **Lab Description:**
<p align="center">
    <img src="./src/05_1.png" style="width: 500px;">
</p>

### **Solution:**
* Vào trang feedback, nộp một cái feedback bất kỳ, thấy ko có gì xảy ra cả. Để ý trên URL có một param "returnPath=\", đoán là nó sẽ liên quan đến link tới trang gốc, xem source thì thấy có một thẻ &lt;a> có href tới source
<p align="center">
    <img src="./src/05_2.png" style="width: 500px;">
</p>

* Thử thay param đó thành giá trị khác, thấy giá trị của href cũng thay đổi theo, chứng tỏ ở đây có thể có DOM-based XSS
<p align="center">
    <img src="./src/05_3.png" style="width: 500px;">
</p>

* Thay value sau vào param, click vào thì alert hiện ra, là lab được solved
<p align="center">
    <img src="./src/05_4.png" style="width: 500px;">
</p>

## *Lab 10: DOM XSS in document.write sink using source location.search inside a select element*
### **Lab Description:**
<p align="center">
    <img src="./src/10_1.png" style="width: 500px;">
</p>

* Web sử dụng document.write() để viết data, mà data lấy từ location.search
* Data nằm trong &lt;select>

### **Solution:**
* Chọn một bài post bất kỳ, kéo xuống dưới cùng thấy chức năng Check stock. Vào source xem thấy có một đoạn script như sau:
<p align="center">
    <img src="./src/10_2.png" style="width: 500px;">
</p>

    ❗Biến store nhận giá trị của param storeId trên path URL mà ko có khâu kiểm duyệt nào, nên ta có thể chèn thêm param đó

* Truyền vào param vs giá trị ngẫu nhiên, ta thấy trong thẻ &lt;select> xuất hiện giá trị mới là giá trị ta nhập vào
<p align="center">
    <img src="./src/10_3.png" style="width: 500px;">
</p>

* Từ đó ta thay thành payload như sau, và alert() sẽ hiện ra
<p align="center">
    <img src="./src/10_4.png" style="width: 500px;">
</p>



# ***Các lab tổng hợp***

## *Lab 12: Reflected DOM XSS*
### **Lab Description:**
<p align="center">
    <img src="./src/12_1.png" style="width: 500px;">
</p>

### **Solution:**
* Search một chuỗi bất kỳ, ta ko thấy điều gì bất thường. Vào xem request và response trả về trong HTTP History, ta thấy phản hồi cho request có dạng JSON như sau:
<p align="center">
    <img src="./src/12_2.png" style="width: 500px;">
</p>

* Check JS source thì thấy có đoạn code sau:
<p align="center">
    <img src="./src/12_3.png" style="width: 500px;">
</p>

* Sau khi test thêm vài lần nữa, ta thấy dấu nháy kép bị escape bằng cách chèn thêm ký tự backslash. Do đó ta bypass bằng cách payload kèm thêm dấu backslash ở đầu. Như vậy payload sẽ có dạng như sau:
<p align="center">
    <img src="./src/12_4.png" style="width: 500px;">
</p>

    ❗Trong payload, dấu ngoặc nhọn ở cuối dùng để đóng JSON lại, hai dấu // dùng để comment, hay vô hiệu hóa đoạn code đằng sau

## *Lab 13: Stored DOM XSS*
### **Lab Description:**
<p align="center">
    <img src="./src/13_1.png" style="width: 500px;">
</p>

### **Solution:**
* Vào một bài post bất kỳ và đăng một chiếc comment bình thường, thấy nội dung vẫn hiển thị ra như sau:
<p align="center">
    <img src="./src/13_2.png" style="width: 500px;">
</p>

* Khi chèn payload có dạng &lt;script>alert(...)&lt;/script>, ta lại nhận được như sau. Check source cho thấy một cặp tag đã bị replace
<p align="center">
    <img src="./src/13_3.png" style="width: 500px;">
</p>

* Nhưng có vẻ cặp <> chỉ bị mã hóa 1 lần, ta thêm vào payload một cặp nữa, và thế là script đã được thực thi
<p align="center">
    <img src="./src/13_4.png" style="width: 500px;">
</p>