<?= $this->extend('admin/layout') ?>

<?= $this->section('admin_content') ?>

<style>
    .calendar-card {
        background: white;
        border-radius: 24px;
        padding: 2rem;
        border: 1px solid var(--border);
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03);
    }

    .calendar-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
    }

    .btn-add {
        background: var(--primary);
        color: white;
        padding: 0.8rem 1.5rem;
        border-radius: 12px;
        text-decoration: none;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        border: none;
        cursor: pointer;
        transition: var(--transition);
    }

    .btn-add:hover {
        background: var(--primary-dark);
        transform: translateY(-2px);
    }

    .events-list {
        margin-top: 30px;
    }

    .event-item {
        display: flex;
        align-items: center;
        padding: 1.2rem;
        background: #F8FAFC;
        border-radius: 16px;
        margin-bottom: 1rem;
        border: 1px solid var(--border);
        transition: var(--transition);
    }

    .event-item:hover {
        background: white;
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        transform: scale(1.01);
    }

    .event-date {
        min-width: 100px;
        text-align: center;
        padding: 0.5rem;
        background: white;
        border-radius: 12px;
        border: 1px solid var(--border);
        margin-right: 1.5rem;
    }

    .event-date .day {
        display: block;
        font-size: 1.25rem;
        font-weight: 800;
        color: var(--primary);
    }

    .event-date .month {
        display: block;
        font-size: 0.75rem;
        text-transform: uppercase;
        font-weight: 600;
        color: var(--text-sub);
    }

    .event-info {
        flex-grow: 1;
    }

    .event-info h3 {
        font-size: 1.1rem;
        font-weight: 700;
        margin-bottom: 0.2rem;
    }

    .event-info p {
        font-size: 0.9rem;
        color: var(--text-sub);
    }

    .event-actions {
        display: flex;
        gap: 0.5rem;
    }

    .btn-icon {
        width: 36px;
        height: 36px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        transition: var(--transition);
    }

    .btn-edit {
        background: #DBEAFE;
        color: var(--primary);
    }

    .btn-delete {
        background: #FEE2E2;
        color: #DC2626;
    }

    .btn-icon:hover {
        transform: scale(1.1);
    }

    /* Modal Styles */
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
        border: none;
        cursor: pointer;
        font-weight: 600;
    }

    #calendar-container {
        margin-top: 30px;
        height: 600px;
    }
</style>

<!-- FullCalendar CSS -->
<link href='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css' rel='stylesheet' />

<div class="calendar-card">
    <div class="calendar-header">
        <div>
            <h2 style="font-size: 1.5rem; font-weight: 700;">Kalender Akademik</h2>
            <p style="color: var(--text-sub);">Kelola agenda dan jadwal kegiatan sekolah.</p>
        </div>
        <button class="btn-add" id="openModalBtn">
            <i class="fas fa-plus"></i> Tambah Kegiatan
        </button>
    </div>

    <!-- Calendar View -->
    <div id='calendar-container'></div>

    <div class="events-list">
        <h3 style="margin-bottom: 1.5rem; font-weight: 700;">Daftar Kegiatan Mendatang</h3>
        <?php if (empty($events)): ?>
            <div style="text-align: center; padding: 3rem; background: var(--bg-light); border-radius: 16px;">
                <p style="color: var(--text-sub);">Belum ada kegiatan yang terdaftar.</p>
            </div>
        <?php else: ?>
            <?php foreach ($events as $event): ?>
                <div class="event-item">
                    <div class="event-date">
                        <span class="day">
                            <?= date('d', strtotime($event['start_date'])) ?>
                        </span>
                        <span class="month">
                            <?= date('M', strtotime($event['start_date'])) ?>
                        </span>
                    </div>
                    <div class="event-info">
                        <div style="display: flex; align-items: center; gap: 0.5rem; margin-bottom: 0.3rem;">
                            <span
                                style="width: 12px; height: 12px; border-radius: 50%; background: <?= $event['color'] ?>;"></span>
                            <h3>
                                <?= $event['title'] ?>
                            </h3>
                        </div>
                        <p>
                            <?= $event['description'] ?>
                        </p>
                        <?php if ($event['end_date']): ?>
                            <small style="color: var(--text-sub); display: block; margin-top: 0.3rem;">
                                <i class="fas fa-clock"></i> Hingga:
                                <?= date('d M Y', strtotime($event['end_date'])) ?>
                            </small>
                        <?php endif; ?>
                    </div>
                    <div class="event-actions">
                        <button class="btn-icon btn-edit edit-event-btn" data-id="<?= $event['id'] ?>"
                            data-title="<?= htmlspecialchars($event['title']) ?>"
                            data-description="<?= htmlspecialchars($event['description']) ?>"
                            data-start="<?= $event['start_date'] ?>" data-end="<?= $event['end_date'] ?>"
                            data-color="<?= $event['color'] ?>">
                            <i class="fas fa-edit"></i>
                        </button>
                        <a href="<?= base_url('admin/academic-calendar/delete/' . $event['id']) ?>" class="btn-icon btn-delete"
                            onclick="return confirm('Apakah Anda yakin ingin menghapus kegiatan ini?')">
                            <i class="fas fa-trash"></i>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>

<!-- Modal Create / Edit -->
<div id="eventModal" class="modal">
    <div class="modal-content">
        <h2 id="modalTitle" style="margin-bottom: 1.5rem; font-weight: 700;">Tambah Kegiatan Baru</h2>
        <form id="eventForm" action="<?= base_url('admin/academic-calendar/store') ?>" method="POST">
            <input type="hidden" name="id" id="event_id">
            <div class="form-group">
                <label for="title">Judul Kegiatan</label>
                <input type="text" name="title" id="title" class="form-control"
                    placeholder="Contoh: Ujian Tengah Semester" required>
            </div>
            <div class="form-group">
                <label for="description">Deskripsi</label>
                <textarea name="description" id="description" class="form-control" rows="3"
                    placeholder="Detail kegiatan..."></textarea>
            </div>
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                <div class="form-group">
                    <label for="start_date">Tanggal Mulai</label>
                    <input type="date" name="start_date" id="start_date" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="end_date">Tanggal Selesai (Opsional)</label>
                    <input type="date" name="end_date" id="end_date" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label for="color">Warna Label</label>
                <input type="color" name="color" id="color" class="form-control" style="height: 50px; padding: 5px;"
                    value="#2563eb">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn-secondary" id="closeModalBtn">Batal</button>
                <button type="submit" class="btn-add">Simpan</button>
            </div>
        </form>
    </div>
</div>

<!-- FullCalendar JS -->
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js'></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // FullCalendar Initialization
        const calendarEl = document.getElementById('calendar-container');
        const calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            locale: 'id',
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            events: [
                <?php foreach ($events as $event): ?>
                        {
                        title: '<?= htmlspecialchars($event['title']) ?>',
                        start: '<?= $event['start_date'] ?>',
                        end: '<?= $event['end_date'] ? date('Y-m-d', strtotime($event['end_date'] . ' +1 day')) : $event['start_date'] ?>',
                        backgroundColor: '<?= $event['color'] ?>',
                        borderColor: '<?= $event['color'] ?>',
                        extendedProps: {
                            description: '<?= htmlspecialchars($event['description']) ?>'
                        }
                    },
                <?php endforeach; ?>
            ],
            eventClick: function (info) {
                // You could open edit modal here if you want
            }
        });
        calendar.render();

        // Modal Logic
        const modal = document.getElementById('eventModal');
        const openBtn = document.getElementById('openModalBtn');
        const closeBtn = document.getElementById('closeModalBtn');
        const form = document.getElementById('eventForm');

        openBtn.addEventListener('click', () => {
            document.getElementById('modalTitle').textContent = 'Tambah Kegiatan Baru';
            form.action = '<?= base_url('admin/academic-calendar/store') ?>';
            form.reset();
            document.getElementById('event_id').value = '';
            modal.classList.add('show');
        });

        closeBtn.addEventListener('click', () => {
            modal.classList.remove('show');
        });

        window.addEventListener('click', (e) => {
            if (e.target == modal) {
                modal.classList.remove('show');
            }
        });

        // Edit Button Logic
        const editBtns = document.querySelectorAll('.edit-event-btn');
        editBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                const id = btn.getAttribute('data-id');
                const title = btn.getAttribute('data-title');
                const description = btn.getAttribute('data-description');
                const start = btn.getAttribute('data-start');
                const end = btn.getAttribute('data-end');
                const color = btn.getAttribute('data-color');

                document.getElementById('modalTitle').textContent = 'Edit Kegiatan';
                form.action = '<?= base_url('admin/academic-calendar/update/') ?>' + id;
                document.getElementById('event_id').value = id;
                document.getElementById('title').value = title;
                document.getElementById('description').value = description;
                document.getElementById('start_date').value = start;
                document.getElementById('end_date').value = end;
                document.getElementById('color').value = color;

                modal.classList.add('show');
            });
        });
    });
</script>

<?= $this->endSection() ?>