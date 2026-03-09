<?= $this->extend('admin/layout') ?>

<?= $this->section('admin_content') ?>

<style>
    .cms-card {
        background: white;
        border-radius: 20px;
        padding: 2rem;
        margin-bottom: 2rem;
        border: 1px solid var(--border);
    }

    .nav-tabs {
        display: flex;
        gap: 1rem;
        margin-bottom: 2rem;
        border-bottom: 1px solid var(--border);
        padding-bottom: 1rem;
    }

    .tab-link {
        padding: 0.8rem 1.5rem;
        border-radius: 12px;
        text-decoration: none;
        color: var(--text-sub);
        font-weight: 600;
        transition: var(--transition);
    }

    .tab-link.active {
        background: #EFF6FF;
        color: var(--primary);
    }

    .item-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
        gap: 1.5rem;
    }

    .program-item {
        background: var(--bg-light);
        border: 1px solid var(--border);
        border-radius: 16px;
        padding: 1.5rem;
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    .program-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .icon-box {
        width: 50px;
        height: 50px;
        background: white;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--primary);
        font-size: 1.25rem;
        border: 1px solid var(--border);
    }

    .tag-list {
        display: flex;
        flex-wrap: wrap;
        gap: 0.5rem;
        margin-top: 0.5rem;
    }

    .badge-tag {
        background: #E2E8F0;
        padding: 0.2rem 0.6rem;
        border-radius: 50px;
        font-size: 0.75rem;
        font-weight: 600;
    }

    /* Missing Styles From UI Screenshot */
    .btn-add {
        background: var(--primary);
        color: white;
        padding: 0.8rem 1.5rem;
        border-radius: 12px;
        border: none;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        cursor: pointer;
        transition: var(--transition);
    }

    .btn-add:hover {
        background: var(--primary-dark);
        transform: translateY(-2px);
    }

    .btn-icon {
        width: 36px;
        height: 36px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        border: none;
        cursor: pointer;
        transition: var(--transition);
    }

    .btn-edit {
        background: #DBEAFE;
        color: var(--primary);
    }

    .btn-delete {
        background: #FEE2E2;
        color: #DC2626;
        text-decoration: none;
    }

    .modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(15, 23, 42, 0.6);
        backdrop-filter: blur(4px);
        z-index: 2000;
        align-items: center;
        justify-content: center;
        padding: 1rem;
        overflow-y: auto;
    }

    .modal.show {
        display: flex;
    }

    .modal-content {
        background: white;
        width: 100%;
        max-width: 500px;
        border-radius: 24px;
        padding: 2.5rem;
        animation: modalFadeIn 0.3s ease-out;
        max-height: 90vh;
        overflow-y: auto;
        position: relative;
    }

    /* Custom Scrollbar for Modal Content */
    .modal-content::-webkit-scrollbar {
        width: 6px;
    }

    .modal-content::-webkit-scrollbar-track {
        background: transparent;
    }

    .modal-content::-webkit-scrollbar-thumb {
        background: #E2E8F0;
        border-radius: 10px;
    }

    @keyframes modalFadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-group label {
        display: block;
        margin-bottom: 0.5rem;
        font-weight: 600;
        font-size: 0.9rem;
    }

    .form-control {
        width: 100%;
        padding: 0.75rem 1rem;
        border: 1px solid var(--border);
        border-radius: 12px;
        font-size: 0.95rem;
        transition: var(--transition);
    }

    .form-control:focus {
        outline: none;
        border-color: var(--primary);
        box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.1);
    }

    .modal-footer {
        display: flex;
        justify-content: flex-end;
        gap: 1rem;
        margin-top: 2rem;
    }

    .btn-secondary {
        background: var(--bg-light);
        color: var(--text-main);
        padding: 0.8rem 1.5rem;
        border-radius: 12px;
        border: 1px solid var(--border);
        cursor: pointer;
        font-weight: 600;
    }
</style>

<div class="nav-tabs">
    <a href="#academic" class="tab-link active" onclick="showTab('academic')">Akademik</a>
    <a href="#extracurricular" class="tab-link" onclick="showTab('extracurricular')">Ekstrakurikuler</a>
    <a href="#achievements" class="tab-link" onclick="showTab('achievements')">Prestasi</a>
</div>

<!-- Academic Tab -->
<div id="tab-academic" class="tab-content">
    <div class="cms-card">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
            <h2>Program Akademik</h2>
            <button class="btn-add" onclick="openModal('academic')"><i class="fas fa-plus"></i> Tambah Program</button>
        </div>
        <div class="item-grid">
            <?php foreach ($academics as $item): ?>
                <div class="program-item">
                    <div class="program-header">
                        <div class="icon-box"><i class="<?= $item['icon'] ?>"></i></div>
                        <div style="display: flex; gap: 0.5rem;">
                            <button class="btn-icon btn-edit"
                                onclick="editProgram(<?= htmlspecialchars(json_encode($item)) ?>)"><i
                                    class="fas fa-edit"></i></button>
                            <a href="<?= base_url('admin/programs/delete/' . $item['id']) ?>" class="btn-icon btn-delete"
                                onclick="return confirm('Hapus program ini?')"><i class="fas fa-trash"></i></a>
                        </div>
                    </div>
                    <div>
                        <h4 style="font-size: 1.1rem; margin-bottom: 0.5rem;">
                            <?= $item['title'] ?>
                        </h4>
                        <p style="color: var(--text-sub); font-size: 0.9rem;">
                            <?= $item['description'] ?>
                        </p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<!-- Extracurricular Tab -->
<div id="tab-extracurricular" class="tab-content" style="display: none;">
    <div class="cms-card">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
            <h2>Klub Ekstrakurikuler</h2>
            <button class="btn-add" onclick="openModal('extracurricular')"><i class="fas fa-plus"></i> Tambah
                Klub</button>
        </div>
        <div class="item-grid">
            <?php foreach ($extras as $item): ?>
                <div class="program-item">
                    <div class="program-header">
                        <div class="icon-box"><i class="<?= $item['icon'] ?>"></i></div>
                        <div style="display: flex; gap: 0.5rem;">
                            <button class="btn-icon btn-edit"
                                onclick="editProgram(<?= htmlspecialchars(json_encode($item)) ?>)"><i
                                    class="fas fa-edit"></i></button>
                            <a href="<?= base_url('admin/programs/delete/' . $item['id']) ?>" class="btn-icon btn-delete"
                                onclick="return confirm('Hapus klub ini?')"><i class="fas fa-trash"></i></a>
                        </div>
                    </div>
                    <div>
                        <span
                            style="font-size: 0.75rem; color: var(--primary); font-weight: 700; text-transform: uppercase;">
                            <?= $item['category'] ?>
                        </span>
                        <h4 style="font-size: 1.1rem; margin-bottom: 0.5rem;">
                            <?= $item['title'] ?>
                        </h4>
                        <p style="color: var(--text-sub); font-size: 0.9rem;">
                            <?= $item['description'] ?>
                        </p>
                        <div class="tag-list">
                            <?php if ($item['tags']): ?>
                                <?php foreach (explode(',', $item['tags']) as $tag): ?>
                                    <span class="badge-tag">
                                        <?= trim($tag) ?>
                                    </span>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<!-- Achievements Tab -->
<div id="tab-achievements" class="tab-content" style="display: none;">
    <div class="cms-card">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
            <h2>Prestasi Ekstrakurikuler</h2>
            <button class="btn-add" onclick="openAchievementModal()"><i class="fas fa-plus"></i> Tambah
                Prestasi</button>
        </div>
        <div class="item-grid">
            <?php foreach ($achievements as $item): ?>
                <div class="program-item" style="border-left: 5px solid <?= $item['color'] ?>;">
                    <div class="program-header">
                        <div class="icon-box" style="color: <?= $item['color'] ?>"><i class="<?= $item['icon'] ?>"></i>
                        </div>
                        <div style="display: flex; gap: 0.5rem;">
                            <button class="btn-icon btn-edit"
                                onclick="editAchievement(<?= htmlspecialchars(json_encode($item)) ?>)"><i
                                    class="fas fa-edit"></i></button>
                            <a href="<?= base_url('admin/achievements/delete/' . $item['id']) ?>"
                                class="btn-icon btn-delete" onclick="return confirm('Hapus prestasi ini?')"><i
                                    class="fas fa-trash"></i></a>
                        </div>
                    </div>
                    <div>
                        <span style="font-size: 0.8rem; font-weight: 700; color: <?= $item['color'] ?>;">
                            <?= $item['date_event'] ?>
                        </span>
                        <h4 style="font-size: 1.1rem; margin-bottom: 0.5rem;">
                            <?= $item['title'] ?>
                        </h4>
                        <p style="color: var(--text-sub); font-size: 0.9rem;">
                            <?= $item['description'] ?>
                        </p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<!-- Program Modal -->
<div id="programModal" class="modal">
    <div class="modal-content">
        <h2 id="modalTitle">Tambah Program</h2>
        <form id="programForm" action="<?= base_url('admin/programs/store') ?>" method="POST">
            <input type="hidden" name="type" id="prog_type">
            <div class="form-group" id="cat_group">
                <label>Kategori (khusus Ekstrakurikuler)</label>
                <input type="text" name="category" id="prog_category" class="form-control"
                    placeholder="Olahraga/Seni/dll">
            </div>
            <div class="form-group">
                <label>Judul</label>
                <input type="text" name="title" id="prog_title" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Deskripsi Singkat</label>
                <textarea name="description" id="prog_description" class="form-control" rows="2" required></textarea>
            </div>
            <div class="form-group">
                <label>Konten Lengkap (Single Page)</label>
                <textarea name="content" id="prog_content" class="form-control" rows="5" placeholder="Gunakan HTML jika perlu..."></textarea>
            </div>
            <div class="form-group">
                <label>URL Gambar Unggulan</label>
                <input type="text" name="image" id="prog_image" class="form-control" placeholder="URL Gambar (misal: /images/ekskul/basket.jpg)">
            </div>
            <div class="form-group">
                <label>Icon (FontAwesome class)</label>
                <input type="text" name="icon" id="prog_icon" class="form-control" placeholder="fas fa-star" required>
            </div>
            <div class="form-group" id="tag_group">
                <label>Tags (pisahkan dengan koma)</label>
                <input type="text" name="tags" id="prog_tags" class="form-control" placeholder="Basket, Futsal">
            </div>
            <div class="form-group">
                <label>Urutan Tampil</label>
                <input type="number" name="order_rank" id="prog_order" class="form-control" value="0">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn-secondary" onclick="closeModals()">Batal</button>
                <button type="submit" class="btn-add">Simpan</button>
            </div>
        </form>
    </div>
</div>

<!-- Achievement Modal -->
<div id="achievementModal" class="modal">
    <div class="modal-content">
        <h2 id="achModalTitle">Tambah Prestasi</h2>
        <form id="achievementForm" action="<?= base_url('admin/achievements/store') ?>" method="POST">
            <div class="form-group">
                <label>Relasi ke Program/Ekskul (Opsional)</label>
                <select name="program_id" id="ach_program" class="form-control">
                    <option value="">-- Umum / Tanpa Relasi --</option>
                    <optgroup label="Akademik">
                        <?php foreach($academics as $a): ?>
                            <option value="<?= $a['id'] ?>"><?= $a['title'] ?></option>
                        <?php endforeach; ?>
                    </optgroup>
                    <optgroup label="Ekstrakurikuler">
                        <?php foreach($extras as $e): ?>
                            <option value="<?= $e['id'] ?>"><?= $e['title'] ?></option>
                        <?php endforeach; ?>
                    </optgroup>
                </select>
            </div>
            <div class="form-group">
                <label>Judul Prestasi</label>
                <input type="text" name="title" id="ach_title" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Deskripsi</label>
                <textarea name="description" id="ach_description" class="form-control" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label>Icon (FontAwesome)</label>
                <input type="text" name="icon" id="ach_icon" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Waktu Kejadian (Teks)</label>
                <input type="text" name="date_event" id="ach_date" class="form-control" placeholder="Desember 2023"
                    required>
            </div>
            <div class="form-group">
                <label>Warna Aksen</label>
                <input type="color" name="color" id="ach_color" class="form-control" value="#2563eb"
                    style="height: 50px;">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn-secondary" onclick="closeModals()">Batal</button>
                <button type="submit" class="btn-add">Simpan</button>
            </div>
        </form>
    </div>
</div>

<script>
    function showTab(tab) {
        document.querySelectorAll('.tab-content').forEach(c => c.style.display = 'none');
        document.querySelectorAll('.tab-link').forEach(l => l.classList.remove('active'));
        document.getElementById('tab-' + tab).style.display = 'block';
        event.currentTarget.classList.add('active');
    }

    function openModal(type) {
        const modal = document.getElementById('programModal');
        const form = document.getElementById('programForm');
        form.reset();
        document.getElementById('modalTitle').textContent = type === 'academic' ? 'Tambah Program Akademik' : 'Tambah Klub Ekstrakurikuler';
        document.getElementById('prog_type').value = type;
        form.action = '<?= base_url('admin/programs/store') ?>';

        document.getElementById('cat_group').style.display = type === 'academic' ? 'none' : 'block';
        document.getElementById('tag_group').style.display = type === 'academic' ? 'none' : 'block';

        modal.classList.add('show');
    }

    function openAchievementModal() {
        const modal = document.getElementById('achievementModal');
        const form = document.getElementById('achievementForm');
        form.reset();
        document.getElementById('achModalTitle').textContent = 'Tambah Prestasi';
        form.action = '<?= base_url('admin/achievements/store') ?>';
        modal.classList.add('show');
    }

    function editProgram(data) {
        const modal = document.getElementById('programModal');
        const form = document.getElementById('programForm');
        document.getElementById('modalTitle').textContent = 'Edit Program';
        form.action = '<?= base_url('admin/programs/update/') ?>' + data.id;

        document.getElementById('prog_type').value = data.type;
        document.getElementById('prog_category').value = data.category;
        document.getElementById('prog_title').value = data.title;
        document.getElementById('prog_description').value = data.description;
        document.getElementById('prog_content').value = data.content;
        document.getElementById('prog_image').value = data.image;
        document.getElementById('prog_icon').value = data.icon;
        document.getElementById('prog_tags').value = data.tags;
        document.getElementById('prog_order').value = data.order_rank;

        document.getElementById('cat_group').style.display = data.type === 'academic' ? 'none' : 'block';
        document.getElementById('tag_group').style.display = data.type === 'academic' ? 'none' : 'block';

        modal.classList.add('show');
    }

    function editAchievement(data) {
        const modal = document.getElementById('achievementModal');
        const form = document.getElementById('achievementForm');
        document.getElementById('achModalTitle').textContent = 'Edit Prestasi';
        form.action = '<?= base_url('admin/achievements/update/') ?>' + data.id;
        
        document.getElementById('ach_program').value = data.program_id;
        document.getElementById('ach_title').value = data.title;
        document.getElementById('ach_description').value = data.description;
        document.getElementById('ach_icon').value = data.icon;
        document.getElementById('ach_date').value = data.date_event;
        document.getElementById('ach_color').value = data.color;

        modal.classList.add('show');
    }

    function closeModals() {
        document.querySelectorAll('.modal').forEach(m => m.classList.remove('show'));
    }
</script>

<?= $this->endSection() ?>