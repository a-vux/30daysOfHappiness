# **Một số cách dùng hay gặp của `find`**
## *Tìm file theo tên:*
```
find <directory> -name <file_name>
```
- Tìm file có tên `flags.txt` trong dir hiện tại:
<p align="center">
    <img src="../src/find1.png" style="width: 500px">
</p>

- Tìm file có extion `.txt` trong `/home` directory:
<p align="center">
    <img src="../src/find2.png" style="width: 500px">
</p>

## *Tìm file hoặc thư mục theo quyền:*
```
find <directory> -perm <quyền>
```
- Tìm file/folder có permiss<p align="center">
    <img src="../src/find3 mn.png" style="width: 500px">
</p>