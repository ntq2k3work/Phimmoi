<button type="button" class="btn btn-outline-primary mr-2" data-toggle="modal" data-target="#exampleModal">Sửa</button>

<!-- Modal Sửa Thông Tin -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Sửa thông tin người dùng</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.users.update', $user->id) }}" method="POST"  enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="email2">Email</label>
                        <input type="email" class="form-control" id="email2" name="email" placeholder="Enter Email" value="{{ $user->email }}" required />
                        @error('email')
                            <small class="form-text text-muted text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="phone_number">Số điện thoại</label>
                        <input type="tel" class="form-control" id="phone_number" name="phone_number" placeholder="Phone Number" value="{{ $user->phone_number }}" required />
                        @error('phone_number')
                            <small class="form-text text-muted text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="name">Tên</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Your Name" value="{{ $user->name }}" required />
                        @error('name')
                            <small class="form-text text-muted text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="birthday">Ngày sinh</label>
                        <input type="date" class="form-control" id="birthday" name="birthday" value="{{ \Carbon\Carbon::parse($user->birthday)->format('Y-m-d') }}" required />
                        @error('birthday')
                            <small class="form-text text-muted text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="address">Địa chỉ</label>
                        <input type="text" class="form-control" id="address" name="address" value="{{ $user->address }}" required />
                        @error('address')
                            <small class="form-text text-muted text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Giới tính</label><br />
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="genderMale" value="1" {{ $user->gender === 1 ? 'checked' : '' }} />
                            <label class="form-check-label" for="genderMale">Nam</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="genderFemale" value="0" {{ $user->gender === 0 ? 'checked' : '' }} />
                            <label class="form-check-label" for="genderFemale">Nữ</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="genderOther" value="-1" {{ $user->gender === -1 ? 'checked' : '' }} />
                            <label class="form-check-label" for="genderOther">Khác</label>
                        </div>
                        @error('gender')
                            <small class="form-text text-muted text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group text-center mb-3">
                        <label>Ảnh đại diện</label><br />
                        <img src="{{ $user->avatar_url }}" alt="Avatar" class="img-fluid rounded-circle" style="max-width: 150px; max-height: 150px;" data-toggle="modal" data-target="#imageModal" />
                    </div>

                    <div class="form-group">
                        <label for="avatar">Cập nhật Avatar</label>
                        <input type="file" class="form-control-file" id="avatar" name="avatar_url" />
                    </div>

                    <div class="d-flex justify-content-between mt-4">
                        <button type="submit" class="btn btn-success">Lưu thay đổi</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Hủy</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Hiện Ảnh Phóng To -->
<div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <div class="modal-body text-center">
                <img src="{{ $user->avatar_url }}" alt="Avatar" class="img-fluid" />
            </div>
        </div>
    </div>
</div>
