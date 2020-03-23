# ttkt
# soure code gồm 4 folder: admin, config, css,js
# folder css,js để định dạng và tạo giao diện html thông qua boostrap
# folder config chưa file config.php dùng để kết nối đến csdl có tên là da3 trong folder admin
# folder admin chứa các file:
# -- index.php - dùng làm trang mặc định của website.Khi chưa đăng nhập nó sẽ chuyển bạn đến
# file login.php. Khi đăng nhập thành công thì sẽ chuyển bạn đến file admin.php
# -- login.php - form đăng nhập, mỗi tài khoản sẽ có id riêng biệt và cấp độ phân quyền. Ở đây chúng ta có 3 cấp độ phân quyền đó là quản lý
# , trưởng nhóm và nhân viên. Khi đăng nhập thì ta sẽ lưu lại session của id và cấp độ phân quyền của tài khoản.
# -- admin.php - tạo ra các case tương ướng để include các file tương ứng
# - từ 3 cấp độ phân quyền sẽ có các quyền được truy cập tương ứng của tài khoản
# Với cấp độ 1 là quản lý sẽ chuyển đến trang pay.php
# cấp độ 2 là trưởng nhóm sẽ chuyển đón trang leader.php và user.php
# cấp độ 3 là nhân viên sẽ chuyển đến trang money.php
# -- sub_admin.php - nếu không thuộc case nào của admin.php thì sẽ tự động chuyển đến file sub_admin là giao diện mặc định
# -- money.php - dùng để load lịch sử chấm công cho tài khoản cấp độ 3
# -- add_money.php - dùng để chấm công cho tk cấp độ 3
# -- leader.php - dùng để load lịch sử chấm công của nhân viên ( chỉ tk cấp độ 2 mới có )
# -- edit_leader.php - dùng để đánh giá quá trình làm việc của nhân viên ( chỉ tk cấp độ 2 mới có )
# -- user.php - dùng để tạo các tài khoản mới ( chỉ tk cấp độ 2 mới có )
# -- add_user.php - dùng để thêm nhân viên ( chỉ tk cấp độ 2 mới có )
# -- edit_user.php - dùng để thay đổi thông tin nhân viên ( chỉ tk cấp độ 2 mới có )
# -- del_user.php - dùng để xóa tài khoản nhân viên ( chỉ tk cấp độ 2 mới có )
# -- pay.php - dùng để in ra lương của các nhân viên ( chỉ tk cấp độ 1 mới có )
# -- logout.php - dùng để đăng xuất tài khoản
