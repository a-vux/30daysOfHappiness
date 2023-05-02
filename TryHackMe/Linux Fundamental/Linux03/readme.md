# **Terminal Text editor**
## *1. Nano*
- Cú pháp:
```
nano <file>
```
- Dùng phím điều hướng để di chuyển trong file và Enter để xuống dòng
- Nano có vài chức năng căn bản như:
    * Tìm text
    * Copy và paste
    * Nhảy tới dòng thứ n
    * Tìm xem hiện tại đang ở dòng mấy
- Các tính năng này có thể được sử dụng thông qua các tổ hợp phím Ctrl + chữ cái tương ứng

## *2. VIM*
- VIM tổng quan thì nhìn xịn sò hơn Nano
- Trong Tryhackme có hẳn một room cho VIM
- Một số ưu điểm của VIM:
    * Có thể tùy chỉnh tổ hợp phím theo ý muốn
    * Cú pháp highlight (Syntax Highlighting)
    * VIM chạy được trên mọi terminal trong khi Nano thì không
# **Một vài tiện ích**
## *1. Tải files về*
- `wget <URL>`: tải files từ web thông qua HTTP, giống như việc truy cập file trên trình duyệt ý

## *2. Chuyển file giữa các máy*
- SCP, viết tắt của ***S***ecure ***C***o***P***y, là một cách để trao đổi file giữa hai máy tính thông qua giao thức SSH
- Đây được coi là cách trao đổi bảo mật vì nó yêu cầu xác thực (authentication) và mã hóa
- Cú pháp:
```
scp <source> <destination>
```

VD: nếu ta viết như này `scp important.txt ubuntu@192.168.1.30:/home/ubuntu/transferred.txt` thì tức ta đang chuyển file tên `important.txt` sang máy có người dùng tên `ubuntu` ở IP `192.168.1.30` vào thư mục `/home/ubuntu/`. Nếu ta đổi ngược hai vị trí, ta được chuyển file từ máy đó đó về phía máy mình

## *3. Serve file từ chính máy đang sử dụng*
- Ubuntu được cài sẵn python3 (thì phải)
- Python có một module là `HTTPServer`, giúp biến máy thành một web server
- Cú pháp:
```
python3 -m http.server
```
- Cú pháp này giúp serve các files trong thư mục hiện tại, nhưng cái này có thể thay đổi được (xem thêm trong manual page)

# **Tiến trình**
- Tiến trình hiểu đơn giản là một ***chương trình đang chạy*** trên máy, được quản lý bởi kernel
- Mỗi tiến trình có một ***ID riêng*** gọi là `PID`

## *Xem các tiến trình*
- Để xem các tiến trình đang chạy (và các tiến trình này ở ***trong phiên làm việc của người dùng***), sử dụng lệnh `ps`
- Để xem thêm các tiến trình nằm ***ngoài phiên làm việc*** và của ***người dùng khác***, sử dụng `ps aux`
- Ngoài ra còn có lệnh `top` - cho ra một ***bảng thống kê*** các tiến trình đang chạy

## *Quản lý tiến trình*
- Ta có thể thao tác ***hủy tiến trình*** (kill a process), bằng cách sử dụng lệnh `kill <pid>`. Điều này được thực hiện thông qua việc ***gửi tín hiệu***, và có nhiều loại tín hiệu khác nhau:
    * `SIGTERM`: hủy tiến trình một cách ***"gọn gàng"*** (gracefully), tức ***dọn cả những tài nguyên*** mà nó sử dụng và ***thực hiện thêm vài thao tác*** cần thiết trước khi hủy hẳn tiến trình. Các tiến trình con ***không bị hủy theo***

        VD: tiến trình có thể cần đóng các file mà nó mở, release dung lượng mà nó sử dụng, giải phóng bộ nhớ. Nếu không có việc này thì các tài nguyên còn sót có khả năng ảnh hưởng đến hệ thống hoặc các tiến trình khác. Ví dụ khác là tiến trình có thể được lưu lại trạng thái trước khi hủy của nó, như configuration data

    * `SIGKILL`: hủy thẳng tiến trình luôn, giống kiểu ***buộc hủy***, mà không có thêm bất kỳ thao tác nào. Các tiến trình con cũng ***bị hủy theo***. Cú pháp: `kill -9 <PID>`

        ❗Sử dụng SIGKILL như một biện pháp cuối cùng (khi tiến trình bị treo kiểu không có phản hồi gì)
    * `SIGSTOP`: dừng/treo tiến trình (tức không phải hủy nó đi), không cho nó có thêm bất kỳ thao tác nào cho đến khi nhận được tín hiệu `SIGCONT`. Cú pháp: `kill -STOP <pid>`

<p align="center">
    <img src="../src/sigkill-sigterm.jpeg" style="width: 500px">
</p>

## *Cách mà tiến trình được tạo*
- OS sử dụng cái gọi là ***namespace*** để tối ưu hóa việc chia tài nguyên (CPU, RAM,...) cho tiến trình. Namespace giống như việc chia máy tính thành nhiều phần khác nhau
- Namespace giúp việc cô lập các tiến trình với nhau - các tiến trình cùng trong một namespace thì có thể nhìn thấy nhau?
- Tiến trình có PID 0 là tiến trình đầu tiên được chạy khi khởi động máy
- systemd là tiến trình đầu tiên, quản lý các tiến trình của người dùng, nằm trung gian giữa người dùng và OS
- Mọi tiến trình khác sau đó được gọi là ***tiến trình con*** của systemd

## *Cách bắt đầu một tiến trình/dịch vụ*
- Câu lệnh `systemctl` giúp tương tác với tiến trình `systemd` (daemon?) với cú pháp:
```
systemctl [option] [service]
```
- VD: `systemctl start apache2` để khởi động dịch vụ apache2
- Có 4 options chính:
    * `start`
    * `stop`
    * `enable`
    * `disable`

## *Backgrounding và Foregrounding*
- Đây là 2 trạng thái khi tiến trình chạy
- VD: câu lệnh `echo` sẽ tạo ra tiến trình với trạng thái foreground

# **Tự động hóa**
# **Trình quản lý gói**
# **Logs**