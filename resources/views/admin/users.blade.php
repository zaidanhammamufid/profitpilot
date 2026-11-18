@extends('admin.layouts.app')

@section('title', 'ProfitPilot — Data Users')
@section('page-title', 'Data Users')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/Admin/users.css') }}">
@endpush

@section('content')

    <section class="page-intro">
        <h2>Data Pengguna</h2>
        <p>
            Kelola dan lihat seluruh data pengguna ProfitPilot.
        </p>
    </section>

    @if (session('status'))
        <div class="alert-success">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="12" r="9"/>
                <path d="m8.5 12.5 2.5 2.5 4.5-5"/>
            </svg>
            <span>{{ session('status') }}</span>
        </div>
    @endif

    {{-- Panel edit user, tampil langsung di halaman Data Users --}}
    <section class="edit-card" id="editUserPanel" @if (! $errors->any()) hidden @endif>

        <div class="edit-card-header">
            <div>
                <p class="edit-label">EDIT DATA USER</p>
                <h2 id="editUserTitle">Edit Pengguna</h2>
                <p>Perbarui nama toko atau password pengguna melalui form berikut.</p>
            </div>

            <button type="button" class="edit-close"
                    onclick="tutupEditUser()" aria-label="Tutup form edit">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
                    <path d="M18 6L6 18M6 6L18 18"/>
                </svg>
            </button>
        </div>

        @if ($errors->any())
            <div class="form-error" id="editFormError">
                <strong>Data user belum bisa disimpan:</strong>

                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form
            id="editUserForm"
            action="{{ old('user_id') ? route('admin.user.update', old('user_id')) : '#' }}"
            method="POST"
        >
            @csrf
            @method('PUT')

            <input type="hidden" name="user_id" id="editUserId" value="{{ old('user_id') }}">

            <div class="edit-form-grid">

                <div class="form-group">
                    <label for="editNamaToko">Nama Toko</label>

                    <input
                        type="text"
                        id="editNamaToko"
                        name="nama_toko"
                        value="{{ old('nama_toko') }}"
                        placeholder="Masukkan nama toko"
                        maxlength="100"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="editPassword">Password Baru</label>

                    <input
                        type="password"
                        id="editPassword"
                        name="password"
                        placeholder="Masukkan password baru"
                        minlength="6"
                        autocomplete="new-password"
                    >

                    <small class="input-hint">
                        Minimal 6 karakter. Kosongkan jika tidak ingin mengubah password.
                    </small>
                </div>

            </div>

            <div class="edit-actions">
                <button type="button" class="button-cancel" onclick="tutupEditUser()">
                    Batal
                </button>

                <button type="submit" class="button-save">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2Z"/>
                        <path d="M17 21v-8H7v8"/>
                        <path d="M7 3v5h8"/>
                    </svg>
                    Simpan Perubahan
                </button>
            </div>

        </form>

    </section>

    <section class="table-card">

        <div class="table-heading">
            <div>
                <h2>Daftar Pengguna</h2>
                <p>Informasi akun pengguna yang terdaftar.</p>
            </div>
        </div>

        <div class="table-responsive">

            <table>

                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Toko</th>
                        <th>Password</th>
                        <th>Tanggal Daftar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse ($users as $index => $user)

                        <tr>

                            <td>{{ $index + 1 }}</td>

                            <td class="nama-toko">
                                {{ $user->nama_toko }}
                            </td>

                            <td>
                                <div class="password-cell">

                                    <span
                                        id="password-{{ $user->id }}"
                                        data-password="{{ $user->password_tampil }}"
                                    >••••••••</span>

                                    <button
                                        type="button"
                                        class="password-button"
                                        onclick="lihatPassword({{ $user->id }})"
                                        id="button-{{ $user->id }}"
                                        aria-label="Lihat password"
                                    >
                                        <svg class="eye-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M2 12C4.5 7.5 8 5 12 5C16 5 19.5 7.5 22 12C19.5 16.5 16 19 12 19C8 19 4.5 16.5 2 12Z"/>
                                            <circle cx="12" cy="12" r="3"/>
                                        </svg>
                                    </button>

                                </div>
                            </td>

                            <td>
                                {{ $user->created_at->format('d/m/Y') }}
                            </td>

                            <td>
                                <div class="action-buttons">

                                    <a
                                        href="{{ route('admin.user.show', $user->id) }}"
                                        class="detail-button"
                                    >
                                        Detail
                                    </a>

                                    <button
                                        type="button"
                                        class="edit-button"
                                        data-edit-user="{{ $user->id }}"
                                        data-nama-toko="{{ $user->nama_toko }}"
                                        data-update-url="{{ route('admin.user.update', $user->id) }}"
                                        onclick="bukaEditUser({{ $user->id }})"
                                    >
                                        Edit
                                    </button>

                                    <form
                                        action="{{ route('admin.user.destroy', $user->id) }}"
                                        method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus user ini?')"
                                    >
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="delete-button">
                                            Hapus
                                        </button>
                                    </form>

                                </div>
                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="5" class="empty-data">
                                Belum ada user.
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </section>

@endsection

@push('scripts')
    <script>
        const editUserPanel = document.getElementById('editUserPanel');
        const editUserForm = document.getElementById('editUserForm');
        const editUserId = document.getElementById('editUserId');
        const editNamaToko = document.getElementById('editNamaToko');
        const editPassword = document.getElementById('editPassword');
        const editFormError = document.getElementById('editFormError');
        const editUserTitle = document.getElementById('editUserTitle');

        function bukaEditUser(id, options = {}) {
            const trigger = document.querySelector('[data-edit-user="' + id + '"]');

            if (!trigger) {
                return;
            }

            editUserForm.action = trigger.dataset.updateUrl;
            editUserId.value = trigger.dataset.editUser || id;
            editUserTitle.textContent = 'Edit ' + trigger.dataset.namaToko;

            if (options.pertahankanNilai !== true) {
                editNamaToko.value = trigger.dataset.namaToko;
                editPassword.value = '';
            }

            editUserPanel.hidden = false;
            editUserPanel.scrollIntoView({ behavior: 'smooth', block: 'start' });

            window.setTimeout(function () {
                editNamaToko.focus({ preventScroll: true });
            }, 250);
        }

        function tutupEditUser() {
            editUserPanel.hidden = true;
            editUserForm.reset();
            editUserId.value = '';
            editUserForm.action = '#';

            if (editFormError) {
                editFormError.hidden = true;
            }

            const url = new URL(window.location.href);

            if (url.searchParams.has('edit')) {
                url.searchParams.delete('edit');
                window.history.replaceState({}, '', url.toString());
            }
        }

        function lihatPassword(id) {
            const password = document.getElementById('password-' + id);
            const button = document.getElementById('button-' + id);

            if (password.textContent.trim() === '••••••••') {
                password.textContent = password.dataset.password;
                button.classList.add('password-visible');
                button.setAttribute('aria-label', 'Sembunyikan password');
            } else {
                password.textContent = '••••••••';
                button.classList.remove('password-visible');
                button.setAttribute('aria-label', 'Lihat password');
            }
        }

        document.addEventListener('DOMContentLoaded', function () {
            const userIdDariError = editUserId.value;

            if (userIdDariError) {
                bukaEditUser(userIdDariError, { pertahankanNilai: true });
                return;
            }

            const editId = new URLSearchParams(window.location.search).get('edit');

            if (editId) {
                bukaEditUser(editId);
            }
        });
    </script>
@endpush
