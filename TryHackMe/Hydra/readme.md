# **Introduction**
- Hydra là một phần mềm bruteforce password
- Cách tải Hydra:
    * Ubuntu: `apt install hydra`
    * Fedora: `dnf install hydra`

# **Vào bài**
- Tùy vào các dịch vụ / giao thức ta muốn tấn công mà ta có các options khác nhau để truyền vào Hydra
- Nếu muốn brute FTP với username `user` và sử dụng password list `passlist.txt` thì ta chạy lệnh sau:
```
hydra -l user -P passlist.txt ftp://10.10.23.144
```

## *SSH*
- Cú pháp:
```
hydra -l <username> -P <path to passlist> <IP> -t <thread numbers> ssh
```
- Một số flags thông dụng:

|Flag|Mô tả|
|-|-|
|`-l`|Truyền tên người dùng muốn brute (thông qua SSH)|
|`-P`|Truyền đường dẫn tới  password list|
|`t`|Số luồng (threads) muốn tạo ra trong cùng lúc|

## *Web form (POST method):*
- Cú pháp:
```
hydra -l <username> -P <path to passlist> <IP> http-post-form "<path>:<login_credentials>:<invalid_response>"
```