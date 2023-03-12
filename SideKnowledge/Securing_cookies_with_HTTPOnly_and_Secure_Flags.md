- Việc bảo vệ cookie luôn là vấn đề quan trọng, đặc biệt là authentication cookie. Kẻ tấn công chỉ cần có cookie này là hoàn toàn có thể mạo danh người dùng

# HTTP, HTTPS và Secure Flag:
- Khi giao thức HTTP được sử dụng, các dữ liệu gửi qua mạng sẽ ở dạng plaintext --> kẻ tấn công hoàn toàn có thể "nghe lén" nội dung được trao đổi này
- HTTPS là phiên bản bảo mật hơn, nó sử dụng SSL/TLS để bảo vệ dữ liệu trên tầng ứng dụng

## Vậy thì tại sao lại cần Secure Flag khi đã có HTTPS?
- Một trang web có thể có cả HTTP và HTTPS
- Giả sử, cookie được gửi thông qua HTTPS nên nó sẽ không thể bị "nghe lén" được
- Tuy nhiên, kẻ tấn công có thể lợi dùng giao thức HTTP của ứng dụng. Kẻ tấn công có thể gửi link sử dụng HTTP của ứng dụng cho người dùng, người dùng click vào, và request sẽ được tạo đến. Và thế là bùm, cookie vào tay kẻ tấn công
- Ta có thể cho phép cookie chỉ có thể gửi thông qua HTTPS không? Câu trả lời là có, và đó là Secure Flag ra đời. Cookie với Secure flag chỉ có thể gửi thông qua HTTPS

## Vậy thẻ HTTPOnly thì sao?
- Việc "nghe lén" không phải cách duy nhất để lấy được cookie người dùng
- Giả sử một trang web có lỗ hổng XSS, và kẻ tấn công lợi dụng lỗ hổng này  để lấy cookie. Ngăn chặn điều này như nào nhỉ?
- Thế mà HTTPOnly flag lại có thể dùng để giải quyết bài toán này đấy. Khi sử dụng HTTPOnly flag, JS sẽ không thể đọc được cookie trong trường hợp khai thác thông qua XSS
- Flag này có thể được set trong header `Set-Cookie`
- Tưởng thế là xong nhưng còn một lỗ hổng nữa mang tên XST - lợi dụng XSS và phương thức TRACE để đọc cookie kể cả đã dùng HTTPOnly

## Cách XST có thể bypass được HTTPOnly (Đọc sau)