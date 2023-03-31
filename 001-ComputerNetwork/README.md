# **Một số khái niệm cơ sở của mạng máy tính:**
1. *Open system (hệ thống mở)*: là hệ thống ***kết nối với mạng máy tính*** và có thể sẵn sàng giao tiếp
2. *Closed system (hệ thống đóng)*: là hệ thống ***không kết nối với mạng máy tính***, không thể giao tiếp với máy khác và cũng không nhận giao tiếp
3. *Computer network (mạng máy tính)*: sự ***kết nối giữa các thiết bị*** (các hosts) theo nhiều cách khác nhau để chia sẻ dữ liệu. Giữa hai thiết bị cũng có thể kết nối với nhau thông qua các thiết bị khác nhau (router, switch, hub, bridge) và tạo thành một mạng máy tính
4. *Nodes*: các thiết bị kết nối với mạng máy tính

    ❗Node khác host ở chỗ: node chỉ chung các ***thiết bị kết nối*** với mạng máy tính, nhưng host yêu cầu phải có thêm ***địa chỉ IP***. Tức mọi host đều là node, nhưng node chưa chắc đã là host

5. *Routing*: trong mạng máy tính thì có nhiều nodes, mỗi node cũng có thể có nhiều đường tới các nodes khác. Routing là quá trình ***chọn ra đường tốt nhất*** cho các nodes dựa trên một số luật lệ định sẵn nào đó, giúp tăng hiệu suất bằng cách quản lý data traffic (giao thông dữ liệu)

6 *Địa chỉ IP*: là ***địa chỉ mạng*** ứng với ***mỗi thiết bị khi kết nối vào mạng*** máy tính và là duy nhất

❗Sử dụng ***ipconfig*** để trả về địa chỉ IP của thiết bị đang sử dụng

7. *Địa chỉ MAC (Media Access Control)*: là một ***định danh duy nhất của NIC*** (Network interface card - card giao tiếp mạng)

❗NIC là một phần cứng trên máy tính giúp kết nối với internet

❗Sử dụng ***ipconfig/all*** để trả về MAC address

8. *Port (cổng)*: một ***kênh*** mà dữ liệu có thể được ***gửi hoặc nhận***. Mỗi host có thể có nhiều ứng dụng chạy, và mỗi ứng dụng được định danh ứng với số port mà nó chạy. Số port là một ***dãy 16 bit***

❗Sử dụng ***netstat-a*** để list toàn bộ port đang sử dụng

9. *Đơn vị dữ liệu giao thức (PDU - Protocol Data Unit)*: là ***đơn vị thông tin*** ở mỗi tầng. Nó sẽ được bổ sung thêm hoặc loại bỏ bớt thông tin đi mỗi lần chuyển giữa các tầng

10. *Máy khách (client)*: là một máy tính hoặc một phần mềm có thể ***sử dụng dịch vụ*** cung cấp bởi máy chủ

11. *Máy chủ (server)*: là một máy tính hoặc một phần mềm có thể ***cung cấp dịch vụ*** cho máy khách

<br>

# **OSI Model (Mô hình OSI):**
- OSI - Open Systems Interconnection reference model, dịch là ***Mô hình tham chiếu kết nối các hệ thống mở***
(Interconnection: sự liên kết chặt chẽ về nhiều mặt)
- Là một mô hình gồm ***7 tầng*** giúp hình dung mô hình ***mạng máy tính*** hoạt động như thế nào, hay các hệ thống máy tính ***giao tiếp với nhau*** kiểu gì
* Là mô hình có xu hướng tiếp cận theo ***chiều dọc***
- 3 tầng trên cùng được chụm chung là ***tầng phần mềm*** (software layers), tầng chính giữa (tầng 4 - tầng giao vận) được ví là ***Heart of OSI***, 3 tầng cuối được chụm chung là ***tầng phần cứng*** (hardware layers)
- Tuy bây giờ không còn được sử dụng nhiều (được thay thế bởi mô hình TCP/IP) nhưng nó vẫn có vai trò trong việc ***xử lý, giải quyết các vấn đề*** phát sinh nhờ chia nhỏ cách thức giao tiếp giữa các hệ thống thành các phần riêng lẻ
## ***Các tầng của mô hình OSI:***
### *1. Physical layer - tầng vật lý*
- Đại diện cho các ***kết nối vật lý*** giữa các thiết bị
- Các thiết bị: hub (na ná switch), repeater (tăng sóng), modem, cable (dây cáp)
- Đơn vị dữ liệu ở tầng này là ***dữ liệu thô*** (raw data), tức là các ***bit***. Nó nhận các xung tín hiệu (signal) và chuyển hóa thành các bit 0 và 1 và gửi tới tầng liên kết dữ liệu
- Vai trò: 
    * Đồng bộ bit (Bit synchronization): đảm bảo một bit gửi ứng với một bit nhận
    * Quản lý tốc độ truyền bit (Bit rate control): quản lý lượng bits được truyền mỗi giây
    * Hình trạng mạng (Topology): mô tả cách bố trí các thiết bị phần cứng (các nodes). Ví dụ như bus, ring, star, mesh
    * Chế độ truyền (Transmission mode): quy định chế độ truyền giữa hai thiết bị. Ví dụ như chế độ [đơn công (simplex), bán song công (half-duplex), song công toàn phần (full-duplex)](https://cntt.donga.edu.vn/thong-tin-chi-tiet/tim-hieu-ve-simplex-half-duplex-va-full-duplex-19294#:~:text=C%C3%B3%203%20ch%E1%BA%BF%20%C4%91%E1%BB%99%20truy%E1%BB%81n,%C4%91%C6%B0%E1%BB%A3c%20truy%E1%BB%81n%20theo%20m%E1%BB%99t%20h%C6%B0%E1%BB%9Bng.)

### *2. Data link layer - tầng liên kết dữ liệu*
* Vận chuyển, đảm bảo dữ liệu giữa các nodes (trong cùng một mạng) để không phát sinh lỗi
* Các thiết bị: switch, bridge 
* Có thể chia tầng này thành 2 tầng nhỏ hơn:
    * Logical link control (LLC)
    * Media access control (MAC)
* Đơn vị dữ liệu của tầng này là các ***frames***
* Packets gửi từ tầng mạng được chia thành frames, ngoài ra địa chỉ MAC của máy gửi và máy nhận cũng được bổ sung thêm vào header của frame
* Vai trò:
    * Framing: chuyển đổi packet thành frame
    * Physical addressing (chèn địa chỉ vật lý): thêm địa chỉ MAC của bên gửi và bên nhận vào header của frame
    * Quản lý lỗi (error control): giúp phát hiện và truyền lại những frames bị thất thoát thông qua checksum
    * Quản lý luồng hoạt động (flow control): tốc độ truyền dữ liệu luôn phải cố định nếu 
    * Quản lý truy cập (access control): khi có một kênh truyền giữa các nhiều thiết bị khác nhau, lớp MAC sẽ quyết định thiết bị nào quản lý kênh này trong thời gian nào

### *3. Network layer - tầng mạng*
- Xử lý địa chỉ IP, routing, truyền dữ liệu từ host này sang host khác (có thể khác mạng)
- Các thiết bị: router
- Đơn vị dữ liệu là các ***packets***
- Vai trò:
    * Routing: chọn ra đường phù hợp giữa hai thiết bị
    * Logical addressing: thêm địa chỉ IP của bên gửi và bên nhận vào header của packet để phân biệt các thiết bị trong mạng lưới
<!-- - Có 2 nhiệm vụ chính: phân nhỏ các phân mảnh thành các gói tin mạng (network packets), sau đó đóng gói lại; routing các gói để tìm đường thuận tiện nhất trên mạng vật lý? -->
### *4. Transport layer - tầng giao vận*
<!-- - Vai trò: có các giao thức vận chuyển như TCP, UDP... dùng để phân dữ liệu thành các phân mảnh (segments) và phục hồi các phân mảnh đó lại để trở thành dữ liệu phục vụ cho tầng phiên -->
- Cung cấp dịch vụ cho tầng ứng dụng và nhận dịch vụ từ tầng mạng, như sử dụng giao thức TCP hoặc UDP
- Các dịch vụ cung cấp:
    * Truyền tin hướng liên kết (Connection-oriented service): bên nhận sẽ gửi tín hiệu ACK sau khi nhận được gói tin, nên việc truyền tin sẽ được đảm bảo hơn
    * Truyền tin không liên kết (Connectionless service): không gửi tín hiệu ACK nên truyền tin sẽ nhanh hơn
- Đơn vị dữ liệu là các ***segments***
- Vai trò:
    * Phân mảnh và ghép lại (Segmentation and Reassembly): đối với bên gửi, nó ***phân mảnh dữ liệu*** từ tầng phiên thành các đơn vị nhỏ hơn, và đối với bên nhận thì nó ***ghép lại*** các mảnh nhỏ thành dữ liệu ban đầu để tầng phiên hiểu
    * Service point addressing: chèn thêm số cổng của bên gửi và bên nhận
- Đối với bên gửi: phân mảnh dữ liệu từ tầng phiên, thực hiện quản lý luồng và quản lý lỗi (giống tầng liên kết dữ liệu)
- Đối với bên nhận: ghép lại các dữ liệu với nhau

&lt;từ các tầng dưới, đơn vị dữ liệu sẽ là ***data***>

### *5. Session layer - tầng phiên*
- Sử dụng APIs để thiết lập kết nối giữa hai máy
- Vai trò:
    * Bắt đầu, duy trì và kết thúc phiên làm việc giữa các thiết bị
    * Đồng bộ (Synchronization): chèn ***checkpoint*** để khi có sự cố xảy ra thì quá trình tự đồng bộ xảy ra, tránh thất thoát dữ liệu

### *6. Presentation layer (hoặc Translation layer) - tầng trình bày*
- Vai trò: 
    * Translation: format (thay đổi, biểu diễn) dữ liệu từ người dùng cho tầng phiên hiểu, hoặc từ tầng phiên cho tầng ứng dụng hiểu
    * Nén (Compression): giảm lượng bits không cần thiết khi truyền qua mạng
    * ***Mã hóa/giải mã***: có thể mã hóa dữ liệu bên gửi và giải mã dữ liệu bên nhận

### *7. Application layer - tầng ứng dụng*
- Vai trò: là ***nơi tương tác giữa người dùng và ứng dụng***, VD như trình duyệt hoặc ứng dụng gửi email...
- Nó cung cấp ***các giao thức*** cho phép nhận và gửi dữ liệu cho người dùng để truy cập vào mạng. VD: HTTP(S), FTP, SMTP, DNS...
<!-- Ba tầng cuối đều cung cấp thông tin cho tầng vận chuyển -->

## ***Ví dụ về mô hình OSI:***
VD: Một người muốn thực hiện việc gửi mail. Dữ liệu sẽ được đi qua từ tầng trên xuống tầng dưới của mô hình OSI, dữ liệu từ các tầng sẽ được thêm vào và xử lý, quá trình này gọi là Encapsulation (Gửi kèm theo thông tin bổ sung)

+) Tầng ứng dụng: tạo dữ liệu như nội dung email, địa chỉ email... để chuẩn bị gửi thông qua giao thức SMTP - Simple Mail Transfer Protocol (Giao thức gửi mail đơn giản)

+) Tầng trình diễn: dữ liệu được format sao cho máy nhận có thể hiểu được, thông thường là format dưới dạng mã ASCII. Tầng này cũng có thể mã hóa dữ liệu nếu cần thiết

+) Tầng phiên: bắt đầu phiên làm việc với thiết bị nhận mail

+) Tầng giao vận: quyết định sử dụng giao thức nào để truyền mail. Ở đây sử dụng TCP để đảm bảo các gói tin được gửi hết. Ngoài ra thông tin về số cổng nguồn và cổng đích cũng được thêm tại đây

+) Tầng mạng: thông tin về địa chỉ IP nguồn (người gửi) và địa chỉ IP đích (người nhận) được thêm tại đây

+) Tầng liên kết dữ liệu: địa chỉ MAC của router và nguồn được thêm tại đây

+) Tầng vật lý: dữ liệu được gửi qua mạng máy tính bằng Ethernet

Khi máy nhận nhận dữ liệu, nó sẽ xử lý dữ liệu một cách tương tự nhưng là từ dưới lên trên (từ tầng vật lý lên tầng ứng dụng

<br>

# **TCP/IP Model (Mô hình TCP/IP)**
* TCP/IP - Transmission Control Protocol / Internet Protocol model, dịch là ***"Mô hình giao thức điều khiển truyền nhận / giao thức liên mạng"***
* Là một mô hình gồm ***4 tầng***, phiên bản ***chính xác hơn*** so với mô hình OSI
* Là mô hình có xu hướng tiếp cận theo ***chiều ngang***

## Các tầng của mô hình TCP/IP:
### *1. Network access layer (hoặc link layer) - tầng truy cập mạng*
- Tương ứng với tầng liên kết dữ liệu và tầng vật lý trong mô hình OSI
- Vai trò: 

### *2. Internet layer - tầng liên mạng*
- Tương ứng với tầng mạng trong mô hình OSI
- IP được thêm vào ở đây

### *3. Host-to-host layer (hoặc transport layer) - tầng truy cập mạng*
- Tương ứng với tầng giao vận trong mô hình OSI
- Có 2 giao thức chủ đạo là TCP và UDP
- ***Port numbers*** của máy nguồn và máy đích được thêm vào ở đây

### *4. Application layer - tầng truy cập mạng*
- Tương ứng với tầng phiên, tầng trình bày và tầng ứng dụng trong mô hình OSI
- Gồm nhiều giao thức dịch vụ như HTTP, HTTPs, FTP, SSH...

<br>

# **Network architecture (Kiến trúc mạng máy tính)**
* Là cách ***bố trí, sắp xếp*** các máy tính trong mạng máy tính và việc ***phân chia công việc*** cho mỗi máy tính

## ***Client-Server Architecture (Kiến trúc mô hình khách - chủ)***
* Là một cấu trúc phân chia công việc giữa ***bên cung cấp dịch vụ*** là servers với ***bên yêu cầu dịch vụ*** là clients
* Một máy chủ trung tâm (central server) có thể cung cấp dịch vụ cho ***nhiều máy khách***. Do đó các dữ liệu được chia sẻ lên server đều có thể truy cập được trên các máy khách
* Các máy khách muốn giao tiếp với nhau đều ***thông qua máy chủ***
* Clients và servers giao tiếp với nhau thông qua ***mô hình request - response***
## *Ưu điểm và nhược điểm:*
|Ưu điểm|Nhược điểm|
|-|-|
|Backup dữ liệu dễ dàng và ít tốn kém do không cần backup dữ liệu riêng lẻ trên mỗi máy tính|Nếu server sập thì tất cả cùng sập|
|Hiệu suất do máy chủ thường khỏe hơn rất nhiều so với các máy khách|Phí duy trì, bảo dưỡng server cao do nó là thành phần chính trong kiến trúc|
|Bảo mật hơn do việc truy cập trái phép đều bị server từ chối, và tất cả dữ liệu được gửi đều phải thông qua server|Tốn kém hơn ở khoản đầu tư cho server để cải thiện tài nguyên, cung cấp dịch vụ cho nhiều máy hơn|
|Khả năng thay đổi quy mô dễ do máy chủ có thể kết nối với nhiều máy khách|-|

## *Ví dụ về kiến trúc mô hình khách - chủ:*
* Một người muốn truy cập dịch vụ online banking thông qua trình duyệt (client), do đó trình duyệt sẽ gửi request tới web server của ngân hàng
* Tài khoản đăng nhập của người đó được lưu trong database, nên web server truy cập vào database server

## **P*eer-to-peer (P2P) Architecture (Kiến trúc đồng đẳng)***
* Là một cấu trúc ***không phân biệt máy chủ hay máy khách*** (thế nên các máy đều được gọi là peer), tức các máy đều có ***quyền hạn*** và ***công việc ngang hàng nhau***
- Các máy tính trong mạng máy tính ***đều liên kết với nhau***
## *Ưu điểm và nhược điểm:*
|Ưu điểm|Nhược điểm|
|-|-|
|Ít tốn kém do không có một server trung tâm nào|Khả năng thay đổi quy mô (Scalability) rất khó do mỗi máy tính đều kết nối với nhau|
|Nếu một máy hỏng thì các máy khác không bị ảnh hưởng|Mỗi máy tính đều cần có dữ liệu backup riêng lẻ và cái phương pháp bảo mật cần được cài đặt riêng lẻ trên mỗi máy tính|
|Dễ cài đặt/xây dựng và duy trì do mỗi máy đều có thể quản lý chính nó|Vấn đề bảo mật kém do mỗi máy tự quản lý chính nó|

<br>

# **IPv4 và IPv6**
- Nhắc lại: địa chỉ IP (IP address) là một địa chỉ duy nhất như một ***định danh*** cho một ***thiết bị trên internet***, chứa thông tin về ***vị trí*** của máy đó và giúp máy đó có thể ***truy cập được vào mạng***
## **IPv4**
- Viết tắt của ***Internet Protocol version 4***
    
    VD: 127.255.255.255
- Địa chỉ gồm ***32 bit*** và và được quy lại về ***hệ thập phân***. Như vậy số địa chỉ khả dĩ là 2^32 địa chỉ (xấp xỉ 4 tỉ) 
- Các thành phần (gồm 4 số) được phân cách nhau bởi ***dấu chấm*** "."

    ❗Các thành phần được chia thành 4 số từ 0-255 và vì máy tính cơ bản là không hiểu hệ thập phân, chỉ hiểu hệ nhị phân nên mỗi số cấu thành từ 8 bit, tổng 4 số là 32 bit

## **IPv6**
- Viết tắt của ***Internet Protocol version 6***, một phiên bản mới hơn của IPv4 để giải quyết vấn đề ***bùng nổ địa chỉ IP***

    VD: 2001:0db8:85a3:0000:0000:8a2e:0370:7334
- Địa chỉ gồm ***128 bit*** và được quy lại về ***hệ thập lục phân*** (hexadecimal)
- Các thành phần (gồm 8 bộ) được phân cách nhau bởi ***dấu hai chấm*** ":"

    ❗Các thành phần được chia thành 8 số từ 0-ffff, mỗi bộ số cấu thành từ 16 bit, tổng 8 bộ là 128 bit

<br>

# **Domain Name System (DNS)**
- DNS, dịch ra là ***"Hệ thống phân giải tên miền"***
- Có nhiệm vụ chuyển tên miền thành địa chỉ IP tương ứng và ngược lại
- Tương tự trong mô hình Client-Server, ta có DNS server thực hiện xử lý các truy vấn DNS và DNS client thực hiện gửi truy vấn DNS

## *Cách thức DNS hoạt động*
* Nhìn chung có 4 servers làm việc với nhau để lấy được IP:
    1. *Recursive resolver*: ***nhận truy vấn*** từ DNS client, sau đó ***truy vấn đến 3 loại servers còn lại***. Sau khi nhận IP từ authoritative server, nó chuyển trực tiếp trở về client. Recursive resolver còn có tác dụng lưu địa chỉ IP đó vào cache để khi nếu có bất kỳ truy vấn khác nào vào tên miền đó, nó sẽ trả ngay luôn thay vì thực hiện truy vấn tới các servers một lần nữa
    2. *Root server*: resolver truy vấn server này đầu tiên. Ở đây, root server sẽ trả về resolver địa chỉ IP của TLD server tương ứng
    3. *TLD server (Top-level domain)*: là nơi ***lưu trữ thông tin*** của tên miền. Sau khi nhận request từ resolver thì ***gửi IP của authoritative server***
    4. *Authorative nameserver*: gửi ***IP thật*** của server gốc ban đầu

## *Ví dụ về cách thức hoạt động*:
- Nhập google.com vào thanh tìm kiếm trên trình duyệt. Truy vấn được tạo ra bởi DNS client có sẵn trong trình duyệt và gửi cho recursive resolver đầu tiên
- Sau khi recursive resolver tiếp nhận truy vấn, nó gọi đến lần lượt 3 DNS servers còn lại
- Đầu tiên nó gọi đến root server. Nó phân tích truy vấn, thấy TLD là ".com" nên nó trả về resolver địa chỉ IP của TLD server, cụ thể là .com TLD server
- Tiếp theo resolver giao tiếp với TLD server. TLD server kiểm tra xem tên miền "google.com" có tồn tại không, nếu có thì nó sẽ gửi trả về kết quả địa chỉ IP của authorative nameserver cho resolver
- Cuối cùng, resolver gọi đến authorative nameserver. Authorative server sẽ trả về IP tương ứng với tên miền google.com cho resolver
- Nhận được IP từ authorative server, resolver thực hiện trả về IP cho trình duyệt

# **API**
## *Khái niệm:*
<p align="center">
    <img style="width: 70%" src="./src/api-eg.png">
</p>

- API - Application Programming Interface, dịch là "Giao diện lập trình ứng dụng", là một ***phần mềm trung gian*** giúp hai ứng dụng ***giao tiếp với nhau***

    ❗Nếu UI là giao diện tương tác của ***người dùng và ứng dụng*** thì API là giao diện tương tác của ***ứng dụng A và ứng dụng B***. Giống như người dùng chỉ việc thao tác sử dụng ứng dụng theo chỉ dẫn mà không cần biết cách thức hoạt động ra sao, ứng dụng A cũng chỉ cần làm theo ứng dụng B để có thể tương tác được mà không cần biết gì thêm

## *Tại sao API lại tồn tại, nó đem lại lợi ích gì?*
- Một ứng dụng sinh ra, về mặt tư bản, là để đem lại lợi nhuận. Muốn lợi nhuận cao thì cần có nhiều tính năng, hoặc phải kết hợp với nhiều ứng dụng khác. Giả sử ứng dụng A muốn tích hợp nhiều tính năng của các ứng dụng khác, nếu xây dựng sự tích hợp đó một cách thủ công thì đương nhiên là không khả thi. Vấn đề này đã được API giải quyết. Các ứng dụng khác sẽ build các API của họ, nếu ứng dụng A muốn sử dụng tới dữ liệu hoặc chức năng nào đó mà API cụ thể nào đấy cung cấp, thì A sẽ gửi API request, sau đó nhận được phản hồi từ ứng dụng kia
- Các lợi ích:
    * Tính đơn giản: API cung cấp dữ liệu mong muốn đến cho bên sử dụng mà không cần biết quá nhiều về ứng dụng kia làm như nào
    * Tính hiệu quả: developer không cần code quá nhiều, bê dữ liệu hoặc chức năng của API bên thứ ba về là được
    * Customization: lấy dữ liệu về rồi thì muốn sử dụng nó như nào cũng được

## *Phân loại:*
1. *Internal API* : là API được sử dụng bên trong phần mềm hoặc ứng dụng, tức là ***cùng một hệ thống***. VD như API kết nối Front-end và Back-end
2. *Private API* : dùng cho nội bộ
3. *API provided by Third Parties* : được cung cấp bởi bên thứ 3
4. *Public/Externally API* : được đưa ra thị trường một cách công khai

<br>

# Tài liệu tham khảo:
* OSI Model:
    * [Imperva](https://www.imperva.com/learn/application-security/osi-model/) (checked)
    * [Totolink](https://www.totolink.vn/article/136-mo-hinh-osi-la-gi-chuc-nang-cua-cac-tang-giao-thuc-trong-mo-hinh-osi.html)
    * [Geeksforgeeks](https://www.geeksforgeeks.org/layers-of-osi-model/) (checked)
    * [Cloudflare](https://www.cloudflare.com/learning/ddos/glossary/open-systems-interconnection-model-osi/)
    * [Guru99](https://www.guru99.com/layers-of-osi-model.html)
    * [PDU](https://www.geeksforgeeks.org/protocol-data-unit-pdu/) và sự khác nhau giữa [segments, packets, frames](https://www.geeksforgeeks.org/difference-between-segments-packets-and-frames/)
* TCP/IP Model:
    * [Totolink](https://www.totolink.vn/article/149-mo-hinh-tcp-ip-la-gi-chuc-nang-cua-cac-tang-trong-mo-hinh-tcp-ip.html)
    * [Geeksforgeeks](https://www.geeksforgeeks.org/layers-of-osi-model/)
* Computer Architecture:
    * [Javatpoint](https://www.javatpoint.com/computer-network-architecture)
    * [Client-Server Architecture](https://www.javatpoint.com/computer-network-architecture)
    * [P2P Architecture]()
* IPv4 and IPv6:
    * [Guru99](https://www.guru99.com/difference-ipv4-vs-ipv6.html)
* DNS:
    * [DNS Server from Cloudflare](https://www.cloudflare.com/learning/dns/what-is-a-dns-server/)
    * [Cloudflare](https://www.cloudflare.com/learning/dns/what-is-dns/)
    * [Viblo](https://viblo.asia/p/dns-la-gi-va-cach-thuc-hoat-dong-cua-no-3Q75w7kB5Wb)
* API:
    * [Amazon](https://aws.amazon.com/vi/what-is/api/)
    * [Viblo](https://viblo.asia/p/tim-hieu-kien-thuc-co-ban-ve-api-maGK7A4Mlj2)
    * [Toptdev](https://topdev.vn/blog/api-la-gi/)