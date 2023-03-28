# **Tunneling là gì?**
- Ngoài thế giới thực, tunneling (việc sử dụng đường hầm) là một cách để vượt qua địa hình hoặc vật cản trở mà thông thường không vượt qua được
- Tương tự như vậy, trong mạng máy tính, tunneling là một kỹ thuật dùng để truyền dữ liệu qua mạng lưới bằng cách ***sử dụng những loại giao thức*** mà mạng lưới đó ***không hỗ trợ***
- Tunneling hoạt động bằng cách ***đóng gói gói tin*** (encapsulating packets), với packet (gói tin) là những ***phần nhỏ của dữ liệu*** có thể được tái tạo lại thành một file hoàn chỉnh
- Thường được sử dụng trong các ***mạng riêng ảo*** (Virtual Private Network), giúp cài đặt các đường truyền kết nối giữa các mạng một cách (có thể) bảo mật hơn, cho phép sử dụng các giao thức không được hỗ trợ, và cũng có thể giúp người dùng bypass tường lửa

## *Nhưng đóng gói gói tin là gì?*
- Ta biết rằng dữ liệu truyền trong mạng được chia nhỏ thành các ***gói tin***. Một gói tin sẽ bao gồm hai thành phần:
    * *Header:* chứa thông tin bổ sung như đích đến và giao thức nó sử dụng
    * *Payload:* nội dung chính
- Một gói tin mà được đóng gói (encapsulated) bản chất là ***một gói tin nằm trong một gói tin khác***. Nói cách khác, đóng gói gói tin là việc cho một gói tin vào bên trong ***payload*** của một gói tin khác bên ngoài

## *Đóng gói gói tin có gì mà cần thiết thế?*
- Mỗi gói tin trên mạng đều sử dụng các giao thức để tới được đích đến. Tuy nhiên, ***không phải tất cả các loại mạng đều hỗ trợ tất cả các dạng giao thức khác nhau***
- Giả sử một công ty muốn thiết lập mạng WAN kết nối văn phòng A và văn phòng B. Công ty sử dụng giao thức IPv6, nhưng mạng kết nối giữa văn phòng A và văn phòng B chỉ hỗ trợ IPv4. Bằng cách đóng gói các gói tin IPv6 trong gói tin IPv4, công ty có thể vẫn sử dụng IPv6 để gửi dữ liệu giữa các văn phòng
- Việc đóng gói còn có lợi cho các ***kết nối mã hóa***. Nếu gói tin được mã hóa (bao gồm cả header của nó), router sẽ không biết được gửi gói tin đấy cho đích đến nào vì chính nó cũng không có key giải mã và cũng không đọc được header. Bằng cách đóng gói gói tin đó vào một gói tin không cần mã hóa, việc vận chuyển giữa các mạng sẽ lại trở về bình thường